<?php

$database = include('config/database.php');

$model = new Model();
$result = $model->getBy('id',9);

var_dump($result);

/*
$result = $model->getByUsername('xiaoming'); 
//作业：
	1、实现getByXxx系列函数
	2、实现聚合函数(count、max、min、avg、sum)
$result = $model->table('user,aaa')->select(MYSQLI_ASSOC);

if ($_SERVER['REMOTE_ADDR'] == '::1') {
	$ip = ip2long('127.0.0.1');
} else {
	$ip = ip2long($_SERVER['REMOTE_ADDR']);
}
$data = ['username'=>'xiaohang','password'=>md5('123456'),'regip'=>$ip,'aaaa'=>'bbb'];
$result = $model->insert($data,true);

$result = $model->where('id=94')->delete();

$result = $model->where('id=93')->update(['username'=>'xiaosun']);
*/
var_dump($result);
echo $model->getLastSql();
class Model
{
	//数据库连接
	protected $link;
	//主机地址
	protected $host;
	//用户名
	protected $user;
	//密码
	protected $pwd;
	//数据库名
	protected $dbName;
	//数据表名
	protected $tableName = 'article';
	//字符集
	protected $charset;
	//表前缀
	protected $prefix;
	//缓存字段
	protected $fields;
	//缓存目录
	protected $cache;
	//保存所有的参数
	protected $options;
	//保存最后执行的SQL语句
	protected $sql;

	public function __construct($config=null)
	{
		if (empty($config)) {
			if (empty($GLOBALS['database'])) {
				$config = include('config/database.php');
			} else {
				$config = $GLOBALS['database'];
			}			
		}
		$this->host = $config['DB_HOST']; 
		$this->user = $config['DB_USER'];
		$this->pwd = $config['DB_PWD'];
		$this->dbName = $config['DB_NAME'];
		$this->prefix = $config['DB_PREFIX'];
		$this->charset = $config['DB_CHARSET'];
		$this->cache = $this->checkCache($config['DB_CACHE']);
		if (!($this->link = $this->connect())) {
			exit('数据库连接失败');
		}
		$this->tableName = $this->getTableName();
		$this->fields = $this->getFields();
		$this->options = $this->initOptions();
	}

	protected function connect()
	{
		$link = mysqli_connect($this->host,$this->user,$this->pwd);
		if (!$link) {
			return false;
		}
		if (!mysqli_select_db($link,$this->dbName)) {
			mysqli_close($link);
			return false;
		}
		if (!mysqli_set_charset($link,$this->charset)) {
			mysqli_close($link);
			return false;
		}
		return $link;
	}


	public function where($where)
	{
		if (is_string($where)) {
			$this->options['where'] = 'where ' . $where;
		} else if (is_array($where)) {
			$this->options['where'] = 'where ' . join(' and ',$where);
		}
		return $this;
	}

	public function group($group)
	{
		if (is_string($group)) {
			$this->options['group'] = 'group by ' . $group;
		} else if (is_array($group)) {
			$this->options['group'] = 'group by ' . join(',',$group);
		}
 		return $this;
	}

	public function order($order)
	{
		if (is_string($order)) {
			$this->options['order'] = 'order by ' . $order;
		} else if (is_array($order)) {
			$this->options['order'] = 'order by ' . join(',',$order);
		}
 		return $this;
	}

	public function having($having)
	{
		if (is_string($having)) {
			$this->options['having'] = 'having ' . $having;
		} else if (is_array($having)) {
			$this->options['having'] = 'having ' . join(' and ',$having);
		}
 		return $this;
	}

	public function limit($limit)
	{
		if (is_string($limit)) {
			$this->options['limit'] = 'limit ' . $limit;
		} else if (is_array($limit)) {
			$this->options['limit'] = 'limit ' . join(',',$limit);
		}
 		return $this;
	}

	public function table($table)
	{
		if (is_string($table)) {
			$table = explode(',', $table);
		} 
		if (is_array($table)) {
			foreach ($table as $key => $value) {
				$value = ltrim($value,$this->prefix);
				$table[$key] = $this->prefix . $value;			
			}
			$this->options['table'] = join(',',$table);
		}
		return $this;
	}

	public function fields($fields)
	{
		if (is_string($fields)) {
			$this->options['fields'] = $fields;
		} else if (is_array($fields)) {
			$this->options['fields'] = join(',',$fields);
		}
 		return $this;
	}

	public function insert($data,$insertId=false)
	{
		//必须是数组
		if (!is_array($data)) {
			return '插入时传递的参数必须是数组';
		}
		$data = $this->checkInsert($data);
		$this->options['fields'] = join(',',array_keys($data));
		$this->options['values'] = join(',',$data);

		$sql = 'INSERT INTO %TABLE%(%FIELDS%) VALUES(%VALUES%)';
		$sql = str_replace(
							[
								'%FIELDS%',
								'%TABLE%',
								'%VALUES%',	
							], 
							[
								$this->options['fields'],
								$this->options['table'],
								$this->options['values'],
							], 
							$sql
						);
		return $this->exec($sql,$insertId);
	}

	public function delete()
	{
		if (empty($this->options['where'])) {
			return '删除数据时请务必写上条件';
		}
		$sql = 'DELETE FROM %TABLE% %WHERE% %ORDER% %LIMIT%';	
		$sql = str_replace(
							[
								'%TABLE%',
								'%WHERE%',
								'%ORDER%',	
								'%LIMIT%',	
							], 
							[
								$this->options['table'],
								$this->options['where'],
								$this->options['order'],
								$this->options['limit'],
							], 
							$sql
						);
		return $this->exec($sql);
	}

	public function update($data)
	{
		if (empty($this->options['where'])) {
			return '更新数据时请务必写上条件';
		}
		if (!is_array($data)) {
			return '必须传递数组';
		}
		$data = $this->checkUpdate($data);
		$this->options['set'] = $data;
		$sql = 'UPDATE %TABLE% SET %SET% %WHERE% %ORDER% %LIMIT%';
		$sql = str_replace(
							[
								'%TABLE%',
								'%SET%',
								'%WHERE%',
								'%ORDER%',	
								'%LIMIT%',	
							], 
							[
								$this->options['table'],
								$this->options['set'],
								$this->options['where'],
								$this->options['order'],
								$this->options['limit'],
							], 
							$sql
						);
		return $this->exec($sql);
	}

	public function select($resultType = MYSQLI_BOTH)
	{
		$sql = 'SELECT %FIELDS% FROM %TABLE% %WHERE% %ORDER% %GROUP% %HAVING% %LIMIT%';
		$sql = str_replace(
							[
								'%FIELDS%',
								'%TABLE%',
								'%WHERE%',	
								'%ORDER%',
								'%GROUP%',
								'%HAVING%',
								'%LIMIT%',
							], 
							[
								$this->options['fields'],
								$this->options['table'],
								$this->options['where'],
								$this->options['order'],
								$this->options['group'],
								$this->options['having'],
								$this->options['limit'],
							], 
							$sql
						);
		return $this->query($sql,$resultType);
	}

	public function getLastSql()
	{
		return $this->sql;
	}

	protected function exec($sql,$insertId=false)
	{
		//保存SQL语句
		$this->sql = $sql;
		//每次执行完SQL语句都要初始化条件
		$this->options = $this->initOptions();

		$result = mysqli_query($this->link,$sql);
		if ($result && $insertId) {
			return mysqli_insert_id($this->link);
		}
		return $result;
	}

	protected function query($sql,$resultType = MYSQLI_BOTH)
	{
		//保存SQL语句
		$this->sql = $sql;
		//每次执行完SQL语句都要初始化条件
		$this->options = $this->initOptions();

		$result = mysqli_query($this->link,$sql);
		if ($result) {
			return mysqli_fetch_all($result,$resultType);
		}
		return $result;
	}

	protected function addQuotes($data)
	{
		if (is_array($data)) {
			foreach ($data as $key => $value) {
				if (is_string($value)) {
					$data[$key] = '\'' . $value . '\'';
				}
			}
		}
		return $data;
	}

	protected function initOptions()
	{
		$fields = join(',',array_unique($this->fields));
		return [
					'where'		=>	'',
					'order'		=>	'',
					'group'		=>	'',
					'having'	=>	'',
					'limit'		=>	'',
					'fields'	=>	$fields,
					'table'		=>	$this->tableName,
				];
	}

	protected function getFields()
	{
		//拼接缓存文件路径名
		$cacheFile = $this->cache . $this->tableName . '.php';
		if (file_exists($cacheFile)) {
			return include($cacheFile);
		}
		//不存在需要进行缓存处理
		$sql = 'desc ' . $this->tableName;
		$result = $this->query($sql, MYSQLI_ASSOC);
		$fields = [];
		foreach ($result as $key => $value) {
			if ($value['Key'] == 'PRI') {
				$fields['_pk'] = $value['Field'];
			}
			$fields[] = $value['Field'];
		}
		$data = "<?php \n return " . var_export($fields,true) . ';';
		file_put_contents($cacheFile,$data);
		return $fields;
	}

	protected function getTableName()
	{
		if ($this->tableName) {
			return $this->prefix . $this->tableName;
		}
		//\index\model\User
		$className = get_class($this);
		if ($pos = strrpos($className,'\\')) {
			$className = strtolower(substr($className, $pos+1));
		}
		return $this->prefix . $className;
 	}

 	protected function checkCache($dir)
 	{
 		$dir = rtrim($dir,'/') . '/';
 		if (!is_dir($dir)) {
 			mkdir($dir,0777,true);
 		}
 		if (!is_readable($dir) || !is_writable($dir)) {
 			chmod($dir, 0777);
 		}
 		return $dir;
 	}

 	protected function checkInsert($data) 
 	{
 		$fields = array_flip($this->fields);
 		$data = array_intersect_key($data,$fields);
 		$data = $this->addQuotes($data);
 		return $data;
 	}

 	protected function checkUpdate($data)
 	{
 		$fields = array_flip($this->fields);
 		$data = array_intersect_key($data,$fields);
 		$data = $this->addQuotes($data);
 		$realData = '';
 		foreach ($data as $key => $value) {
 			$realData .= $key . '=' . $value . ',';
 		}
 		return substr($realData,0,-1); 
 	}

 	public function getBy($field,$value)
 	{
 		//将驼峰转换为下划线 RegTime => reg_time
 		$realField = strtolower($field[0]);
 		$len = strlen($field);
 		for ($i=1; $i < $len; $i++) { 
 			$lower = strtolower($field[$i]);
 			if ($lower != $field[$i]) {
 				$realField .= '_';
 			}
 			$realField .= $lower;
 		}
 		if (is_string($value)) {
 			$value = '\'' . $value . '\'';
 		}
 		$where = $realField . '=' .$value;
 		return $this->where($where)->select();	
 	}
}

