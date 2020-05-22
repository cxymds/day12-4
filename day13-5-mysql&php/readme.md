# 复习：
数据库基本操作 数据表 增删改查 

**数据操作**  CURD

数据库的数据类型 

+ 数字类型
  + 整数
    + tinyint
    + smallint
    + mediumint
    + int
    + bigint
  + 小数
    + float 浮点型单精度
    + double 浮点型双精度
    + decimal 定点型
+ 日期时间
  + date
  + time
  + datetime
  + timestrap
  + year
+ 字符串
  + char
  + varchar
  + enum
  + set
  + text
  + blob

数据库字段的属性：

+ 主键
+ 自增
+ null
+ 默认值
+ 注释
+ 唯一键 
+ 索引

数据库舍得原则：

范式：

1NF: 原子性  每一个属性都是不可拆分，设计为不可拆分。

2NF: 每一个字段必须是主键依赖

3NF: 不能有传递依赖

逆范式：可以保存多份

# PHP操作MySQL

PHP是一个模块化的语言。 按需加载 ，需要什么模块就加载什么模块。

PHP对MySQL的扩展：

```
extension=mysqli
extension=pdo_mysql
```



> 查看PHP环境
>
> phpinfo();

## mysqli 扩展操作

