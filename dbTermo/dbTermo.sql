create schema dbTermo;

create table DayWords(
	Id int not null auto_increment primary key,
    Value varchar(5) not null unique,
    Day date not null unique
);

drop table DayWords;

select * from DayWords;

insert into daywords(Value, Day) values (UPPER('peixe'), STR_TO_DATE( '21/06/2022', '%d/%m/%Y'));
insert into daywords(Value, Day) values (UPPER('caixa'), STR_TO_DATE( '22/06/2022', '%d/%m/%Y'));
insert into daywords(Value, Day) values (UPPER('pedra'), STR_TO_DATE( '23/06/2022', '%d/%m/%Y'));
insert into daywords(Value, Day) values (UPPER('barco'), STR_TO_DATE( '24/06/2022', '%d/%m/%Y'));

select id,DATE_FORMAT(Day, "%d/%m/%Y" ) from daywords;
