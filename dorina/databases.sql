
 create table person(
 id int(20) auto_increment primary key,
  Name varchar(60),
  level varchar(20),
  Licence varchar(20)
);

create table credentials(
 username varchar(30) primary key,
 password varchar(20),
 id int(20),
 

 foreign key (id) references person(id) 
 on delete cascade on update cascade


);
create table fine(
    id int(20) auto_increment primary key,
    fine varchar(20),
    person int(20),
    Fine_date Date default CURRENT_TIMESTAMP,
    Status varchar(3),
    cost int(10),
    payment int(10),
    UNIQUE INDEX `payment_UNIQUE` (payment ASC),
    foreign key (person) references person(id)
    on delete cascade on update cascade
);
create table payment(
  id int auto_increment primary key,
  fine int(20),
  cost int(10),


  foreign key (fine) references fine(id)
  on delete cascade on update cascade


);
