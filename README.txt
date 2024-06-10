수업중 만들어지는 코드의 실시간 배포
아래 사이트에 접속해 보이는지 확인 필수
https://github.com/eurekasolution/kpc24

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



alter table first CONVERT TO 
    character set utf8mb4 collate utf8mb4_general_ci;


insert into first (id, name, birth) 
    values ('aaaa', '알파벳', '2020-01-01');



