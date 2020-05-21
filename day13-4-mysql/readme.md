# 数据库数据操作CURD

## 1. 添加数据

```
//添加单条数据
insert into table_name(字段列表) values (值列表);
insert into table_name(字段列表) values (值列表);
insert into table_name(字段列表) values (值列表);
//添加多条数据
insert into table_name(字段列表) values (值列表),(值列表),(值列表),(值列表);
```

> 注意：

1. 具有默认值的数据字段是可以省略的，如果字段中有，那么必须传递值。
2. 值列表的数量与字段列表的数量必须是完全一样的，而且顺序不能调整。

## 2. 替换数据

查找数据，如果找到了进行替换，没找到进行添加

```
replace into table_name(字段列表) values(值列表)；
```

> 注意：

值列表和字段列表都要包含主键字段。 

## 3. 修改数据

```
update table_name  set 字段名=值，字段名=值...  where 条件；
//表示修改多少条数据
update table_name  set 字段名=值，字段名=值...  where 条件 limit 数字；
```

> 注意：

在执行修改操作与删除操作的时候一定要关注where条件。没有where条件一定要谨慎操作。

## 4. 删除数据

删除数据也要注意条件。

```
delete from table_name where 条件；
//表示删除多少条数据
delete from table_name where 条件 limit 数字；
```

如果不添加条件相当于清空整张数据表。

## 5. 查询数据

```
select 字段列表 from table_name  条件；
```

+ 查询某一张表里面的所有字段信息，以及所有数据

```
select * from table_name;
```

+ 查询某一张表中某一些字段的所有信息

```
select 字段列表 form table_name;
```

+ 查询一些字段的某一些信息

```
select 字段列表 from table_name  过滤条件；
```

### select 选项

all ：全部的数据，默认的select是all 。 所有查询到的符合条件的数据都会被找出来

distinct：去除重复，重复是针对所有查询的数据列。去除掉符合条件的重复的数据。

### 字段别名

```
字段名 as 别名
例如 ：
name as  姓名
sex as 性别
```

### 数据源

数据源就是指数据的来源，可以是多张表

```
select  字段/*  from table1，table2 where 条件；
```

### where子句

判断条件：>,<,=,>=,<= , like , between and , in /not in,   &&  ,|| ,!  and  or 

> 说明:

like：模糊匹配，左右两边都可以使用% ，%是一个占位符，表示可以是任何符号。

```
select * from stu where name like 'w%';
```

in 与not in 相当于数组

```
select * from student where id in (1,3,5);
select * from student where id=1 || id=3 || id=5;
```

betwween and 相当于在...之间

```
select * from student where age between 20 and 25;
select * from student where age>=20 && age <=25;
```

### group by

> 注意：
>
> 在使用group by 查询的时候，每一个分组只是出来了一条数据。事实上group by是进行分组统计的，而不是进行分组查询的。

统计：MySQL提供了一些统计函数（聚合函数）

```
count()：计算结果的条数。

max():计算指定字段的最大值。

min():计算制定字段的最小值。

avg():计算制定字段的平均值。

sum():计算指定字段的和。
```

分组排序：ASC/DESC：是对分组的整个结果进行排序，而不是对分组的内部进行排序。

ASC ：升序排序。默认的排序方式。

DESC：降序排序。

### having 子句

where子句是磁盘级别的。只有符合where子句判断的才会进入内存，group by是将进入内存的数据进行分组。如果需要对分组之后的数据进行过滤选择，那么就要使用having子句。

having可以实现where的所有操作，但是where不一定能够实现having的所有操作。

> 注意：

+  分组查询只能在having里面使用，不能够在where里面使用。因为where的时候还没有分组统计的结果。


+ having能够使用字段的别名，但是where不行，原理类似。别名也是在进入内存之后添加的。


+ 能够使用where尽量使用where，因为where能够讲数据提前在进入内存的时候过滤掉。提高内存的利用率。

### order by子句

```
select class_name,group_name,max(score)as max from stu  group by class_name,group_name having max>80 order by max asc;
```

order by：排序，根据某个字段进行升序或者降序排序，需要依赖校对集。

基本语法： order by  字段[ASC |DESC]

排序可以进行多字段排序：

多字段排序的时候，先根据某个字段进行排序，然后在排好序的内部再根据第二个字段进行排序。所以，第二个字段不会影响第一个字段的排序.

### limit子句

limit子句是一种限制结果的子句。在一定程度上可以实现数据获取量的安全性。

limit有两种使用方式。

+ 第一种：只用来限制记录的数量：

```
limit 数量；
```

+ 第二种使用方式：

```
limit 起始位置，数量；
```



查询语句最复杂的时候

```
select distinct 字段列表 from table_name where... group by...having...order by...limit... 
```



















































