# 接口开发

## HTTP协议

请求方法：

​	GET，POST，PUT，DELETE，HEAD，OPTION

请求状态码：

​	200 

​	300

​	400

​	500



## PHP后端接收：

​	$_GET

​	$_POST

​	$_REQUEST



## AJAX

原生的ajax：

​	创建xmlhttprequest对象

​	建立连接

​	发送请求

​	监听状态

​		数据返回的处理

jQuery ajax：

​	$.get

​	$.post

​	$.ajax

​	$.getJSON

websocket



## 接口调试

postman

apipost





## 接口文档

小幺鸡  md写接口文档





## 签到系统数据库设计

管理员表：admin

| 字段名    | 字段类型    | 字段长度 | 默认值          | 是否主键 | 描述    |
| ------ | ------- | ---- | ------------ | ---- | ----- |
| id     | int     |      |              | 是，自增 | 管理员id |
| name   | varchar | 255  |              |      | 用户名   |
| pass   | char    | 32   |              |      | 密码    |
| status | enum    |      | 1:正在使用 2:被禁用 |      | 用户状态  |
| type   | enum    |      | 1:管理员 2:老师   |      | 用户类型  |

班级表：xmr_class

| 字段名    | 字段类型    | 字段长度 | 默认值          | 是否主键 | 描述   |
| ------ | ------- | ---- | ------------ | ---- | ---- |
| id     | int     |      |              | 是    | id   |
| name   | varchar | 255  |              |      | 班级名称 |
| status | enum    |      | 1:正在使用 2:被禁用 |      | 班级状态 |

老师与班级的关系表: teacher_class

| 字段名  | 字段类型 | 字段长度 | 默认值  | 是否主键 | 描述    |
| ---- | ---- | ---- | ---- | ---- | ----- |
| id   | int  |      |      | 是    | id    |
| tid  | int  |      |      |      | 老师的编号 |
| cid  | int  |      |      |      | 班级的编号 |

学生表：student

| 字段名    | 字段类型    | 字段长度      | 默认值  | 是否主键 | 描述   |
| ------ | ------- | --------- | ---- | ---- | ---- |
| id     | int     |           |      | 是    | id   |
| name   | varchar | 255       |      |      | 学生名称 |
| cid    | int     |           |      |      | 班级id |
| phone  | char    | 11        |      |      | 手机号  |
| pass   | char    |           |      |      | 密码   |
| status | enum    | 1:正常 2：请假 |      |      | 学生状态 |

签到表：sign

| 字段名         | 字段类型     | 字段长度 | 默认值  | 是否主键 | 描述   |
| ----------- | -------- | ---- | ---- | ---- | ---- |
| id          | int      |      |      | 是    | id   |
| tid         |          |      |      |      | 老师id |
| cid         |          |      |      |      | 班级id |
| create_time | datetime |      |      |      | 创建时间 |
| end_time    | datetime |      |      |      | 结束时间 |

随机码表：code
| 字段名    | 字段类型 | 字段长度 | 默认值  | 是否主键 | 描述    |
| ------ | ---- | ---- | ---- | ---- | ----- |
| id     | int  |      |      | 是    | id    |
| sid    |      |      |      |      | 签到id  |
| stu_id |      |      |      |      | 学生的id |
| code   | char | 6    |      |      | 随机码   |
