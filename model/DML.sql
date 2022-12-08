INSERT INTO users
VALUES ('alanjmckenna',
              't1234s',
              'Alan',
              'McKenna',
              '38 Cranley Road',
              'Fairview',
              'Dublin',
              '9998377',
              '856625567');

INSERT INTO users
VALUES ('joecrotty',
              'kj7899',
              'Joseph',
              'Crotty',
              'Apt 5 Clyde Road',
              'Donnybroof',
              'Dublin',
              '8887889',
              '876654456');

INSERT INTO users
VALUES ('tommy100',
              '123456',
              'Tom',
              'Behan',
              '14 Hyde Road',
              'Dalkey',
              'Dublin',
              '99983747',
              '876738782');

INSERT INTO categories
VALUES ('001',
              'Health');

INSERT INTO categories
VALUES ('002',
              'Business');

INSERT INTO categories
VALUES ('003',
              'Biography');

INSERT INTO categories
VALUES ('004',
              'Technology');

INSERT INTO categories
VALUES ('005',
              'Travel');

INSERT INTO categories
VALUES ('006',
              'Self-Help');

INSERT INTO categories
VALUES ('007',
              'Cookery');

INSERT INTO categories
VALUES ('008',
              'Fiction');

INSERT INTO books
VALUES ('093-403992',
              'Computers in Business',
              'Alicia Oneill',
              3,
              1997,
              003,
              false);

INSERT INTO books
VALUES ('23472-8729',
              'Exploring Peru',
              'Stephanie Birch',
              4,
              2005,
              005,
              false);

INSERT INTO books
VALUES ('237-34823',
              'Business Strategy',
              'Joe Peppard',
              2,
              2002,
              002,
              false);

INSERT INTO books
VALUES ('23u8-923849',
              'A Guide to Nutrition',
              'John Thorpe',
              2,
              1997,
              001,
              false);

INSERT INTO books
VALUES ('2983-3494',
              'Cooking for Children',
              'Anabelle Sharpe',
              1,
              2003,
              007,
              false);

INSERT INTO books
VALUES ('82n3-308',
              'Computers for Idiots',
              'Susan ONeill',
              5,
              1998,
              004,
              false);

INSERT INTO books
VALUES ('9823-23984',
              'My Life in Picture',
              'Kevin Graham',
              8,
              2004,
              001,
              false);

INSERT INTO books
VALUES ('9823-2403-0',
              'DaVinci Code',
              'Dan Brown',
              1,
              2003,
              008,
              false);

INSERT INTO books
VALUES ('98234-029384',
              'My Ranch in Texas',
              'George Bush',
              1,
              2005,
              001,
              true);

INSERT INTO books
VALUES ('9823-98345',
              'How to Cook Italian Food',
              'Jamie Oliver',
              2,
              2005,
              007,
              true);

INSERT INTO books
VALUES ('9823-98487',
              'Optimising your Business',
              'Cleo Blair',
              1,
              2001,
              002,
              false);

INSERT INTO books
VALUES ('988745-234',
              'Tara Road',
              'Maeve Binchy',
              4,
              2002,
              008,
              false);

INSERT INTO books
VALUES ('993-004-00',
              'My Life in Bits',
              'John Smith',
              1,
              2001,
              001,
              false);

INSERT INTO books
VALUES ('9987-0039882',
              'Shooting History',
              'Jon Snow',
              1,
              2003,
              001,
              false);

INSERT INTO reservations
VALUES ('98234-029384',
              'joecrotty',
              STR_TO_DATE('2008-10-11', '%Y-%m-%d'));

INSERT INTO reservations
VALUES ('9823-98345',
              'tommy100',
              STR_TO_DATE('2008-10-11', '%Y-%m-%d'));
