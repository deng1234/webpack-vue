考试系统
=========

## 前言
女友因为担任班上学委，学校要求进行以读书为主题开展相关的活动。她就找到我，让我给她做一个考试管理系统，自己花了大概一天时间完成了，偷偷告诉她我做了两周，哈哈。尽管这个考试系统比较小，但也算是麻雀虽小，五脏俱全了，新手可以拿来练练手。因为最近沉迷于vue-element无法自拔，所以该项目仍然是采用vue进行前端代码的编写。

## Demo && 演示
**点击这里可以直接访问[考试](http://www.boyalibrary.com/literature/)**

注意：一个账号只能够做一次题目，所以给出了多个账号，但是密码都是相同的
登录账号：333,444,555,666,777,888,999
密码：12345678


## Build Setup
```
# install dependencies
npm install

# server with hot reload at localhost:8080
npm run dev

# build production
npm run build
```

## 技术栈
- [vue](https://cn.vuejs.org/)

- [webpack](http://webpack.github.io/docs/)

- [element-ui](http://element.eleme.io/#/)

- [less](http://lesscss.cn/)

- [es6](http://es6.ruanyifeng.com/)

- [php](http://www.php.net/)

- [mysql](https://www.mysql.com/)


## 项目目录

```
Exam
|
├── server                             # 后台程序  
|  ├── Common.php               	   # 后台公共函数
|  ├── DB.php                          # 数据库连接类
|  ├── ErrorMsg.php                    # 错误信息类
|  ├── Question.php                    # 题目类
|  ├── Server.php                      # 处理请求
|  ├── User.php                        # 用户类
├── src                                
|  ├── assets                          
|     ├── css                          
|		├── reset.css                  # 公共文件
|  ├── components                            
|     ├── vue-index                    # 题目页面  
|     ├── vue-login			           # 登录页面
|  ├── element                              
|     └── index.js                     # 按需引入element-ui的控件
|  ├── App.vue
|  ├── index.js                        
├── .babelrc                           # 设置转码和规则
├── index.html                         
├── Mysql.sql                          # 数据库语句  
├── package.json                       # 依赖  
├── README.md                        
└── webpack.config.js                  # webpack配置文件
```