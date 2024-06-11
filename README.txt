수업중 만들어지는 코드의 실시간 배포
아래 사이트에 접속해 보이는지 확인 필수
https://github.com/eurekasolution/kpc24

w3schools.com/bootstrap5


A1300 : 첫날 13:00시를 의미
B0900 : 두째날 09:00를 의미 (커밋한 시간)

이 README 파일에 필요한 설명을 모아놓을 예정입니다.
test


void test(char *str)
{
    char buf[100];
    strcpy(buf, str);
}
// ./kpc "hello world"
int  main(int argc, char **argv)
{
    test(argv[1]);

    int i = 3;

    printf("%03d\n", i); // 003
}


main()
{
    a();
        a1();
        a2();
            a21();
    b();
        b1();
            b11();
        b2();

}

http://localhost:8000
참고 사이트 
w3schools.com



connect()
for( ;;)
    insert()
close();

for(; ; )
    connect();
    insert();
    close();

http://localhost:8000/phpmyadmin

create table first (
    idx int(10) auto_increment,
    id  char(20) unique,
    name char(20) ,
    birth date,
    primary key(idx)
);
alter database kpc COLLATE='utf8mb4_general_ci';
drop table first;

참고용
alter table first CONVERT TO 
    character set utf8mb4 collate utf8mb4_general_ci;


insert into first (id, name, birth) 
    values ('aaaa', '알파벳', '2020-01-01');

insert into first (id, name, birth) 
    values('bbbb', '비비비비', '2000-01-01');



index.php?cmd=a

include "$a.php";
a.php ~ z.php

javascript:alert(document.cookie);

Web Proxy 다운로드 

download  Burp Suite

create table users (
    idx int(10) auto_increment,
    id  char(20) unique,
    pass char(50),
    name char(20) ,
    level int(3) default '1',
    regtime datetime,
    primary key(idx)
);

alter table users add level int(3) default '1' after name;

insert into users (id, pass, name, level, regtime) 
    values('admin', password('abcd'), '관리자', '9', now() );
insert into users (id, pass, name, level, regtime) 
    values('test', password('abcd'), '테스터', '1', now() );
insert into users (id, pass, name, level, regtime) 
    values('user', password('bcde'), '유저', '1', now() );

주석
// single line comment
/*
    multi line comment
*/

<!-- web comment -->
# config
; config
-- db sql 의 주석

create table users2 (
    idx int(10) auto_increment,
    id  char(20) unique,
    pass char(50),
    name char(20) ,
    level int(3) default '1',
    -- 1 : 일반 사용자
    -- 9 : 관리자
    regtime datetime,
    primary key(idx)
);
