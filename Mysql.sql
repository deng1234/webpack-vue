--创建数据库
create database Exam;
alter database Exam default character set utf8;

--创建用户表
create table Users(
	userid int auto_increment primary key,
	username varchar(9) not null,
	studentid char(8) not null,
	score tinyint not null default 0,
	finish tinyint not null default 0
);

--创建题目表
create table ExamQuestion (
	ExamQuestionid int auto_increment primary key,
	problem varchar(100) not null,
	optionA varchar(100) not null,
	optionB varchar(100) not null,
	optionC varchar(100) not null,
	optionD varchar(100) not null,
	answer char(1) not null
);

insert into ExamQuestion(problem,optionA,optionB,optionC,optionD,answer)
values('下面对文学名著的点评不正确一项是',
	'《格列弗游记》是一部杰出的讽刺小说，作者用虚构的情节和幻想的手法，揭露批判了当时英国统治阶级的腐败与罪恶。',
	'《童年》是高尔基以自身经历为原型创作的自传体小说三部曲中的第一部，这部小说生动地再现了19世纪七八十年代俄罗斯下层人民的活动状况。',
	'《鲁滨孙飘流记》的主人公鲁滨孙热衷于航海，性格坚毅。他在小人国、大人国历险多年，吃尽千辛万苦，终于得到了可观的财富。',
	'《水浒》中的英雄性格各不相同，但在“义”这一点上却是共同的。晃盖劫取生辰纲是“义”，宋江私放晃盖是“义”，鲁提辖拳打镇关西也是“义”。',
	'C');

insert into ExamQuestion(problem,optionA,optionB,optionC,optionD,answer)
	values('藐视吴臣若小儿，单刀赴会敢平欺。当年一段英雄气，尤胜相如在渑池。它所称赞的人物是',
		'诸葛亮','黄忠','关羽','张飞','C');

insert into ExamQuestion(problem,optionA,optionB,optionC,optionD,answer)
	values('《三国演义》中有一位英雄，他是蜀国“五虎上将”之一，刘备为其加封号为“虎威将军”，他的英名是在单骑救主一战中奠定的，在截江夺主后更是声名远播。这位英雄是',
		'关羽','张飞','赵云','马超','C');


insert into Users(username,studentid,score,finish) values('333','12345678',0,0);
insert into Users(username,studentid,score,finish) values('444','12345678',0,0);
insert into Users(username,studentid,score,finish) values('555','12345678',0,0);
insert into Users(username,studentid,score,finish) values('666','12345678',0,0);
insert into Users(username,studentid,score,finish) values('777','12345678',0,0);
insert into Users(username,studentid,score,finish) values('888','12345678',0,0);
insert into Users(username,studentid,score,finish) values('999','12345678',0,0);