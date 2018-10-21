CREATE TABLE public.user
(
   id SERIAL NOT NULL PRIMARY KEY,
   username VARCHAR(100) NOT NULL UNIQUE,
   password VARCHAR(100) NOT NULL
);

CREATE TABLE job_name
(
   id SERIAL NOT NULL PRIMARY KEY,
   name VARCHAR(100) NOT NULL
);

CREATE TABLE job_number
(
   id SERIAL NOT NULL PRIMARY KEY,
   number VARCHAR(100) NOT NULL UNIQUE,
   name INT NOT NULL REFERENCES job_name(id),
);

CREATE TABLE notes
(
   id SERIAL NOT NULL PRIMARY KEY,
   user_id INT NOT NULL REFERENCES public.user(id),
   number_id INT NOT NULL REFERENCES job_number(id),
   name_id INT NOT NULL REFERENCES job_name(id),
   note_text TEXT
);

CREATE TABLE address
(
   id SERIAL NOT NULL PRIMARY KEY,
   street VARCHAR(100) DEFAULT 'street',
   city VARCHAR(50) DEFAULT 'city',
   state VARCHAR(20) DEFAULT 'Texas',
   zip INT DEFAULT 76000,
   number_id INT NOT NULL REFERENCES job_number(id)
);





INSERT INTO public.user (id, username, password) VALUES(DEFAULT, 'Tonyw','Tonyw'), (DEFAULT, 'Test', 'Testpw');
INSERT INTO public.job_name (id, name) VALUES(DEFAULT, 'Test Job Name 1'), (DEFAULT, 'Test Job Name 2');
INSERT INTO public.job_number (id, number, name) VALUES(DEFAULT, '18-1000', (SELECT id FROM job_name WHERE id=1) ), (DEFAULT, '18-1100', (SELECT id FROM job_name WHERE id=2));
INSERT INTO public.notes (id, user_id, number_id, name_id, note_text) 
VALUES (DEFAULT, (SELECT id FROM public.user WHERE id=1), (SELECT id FROM job_number WHERE id=2), (SELECT id FROM job_name WHERE id=1), 'This is a note from user Tonyw!'), 
       (DEFAULT, (SELECT id FROM public.user WHERE id=2), (SELECT id FROM job_number WHERE id=2), (SELECT id FROM job_name WHERE id=1), 'This is a note from user Test.'),
       (DEFAULT, (SELECT id FROM public.user WHERE id=1), (SELECT id FROM job_number WHERE id=3), (SELECT id FROM job_name WHERE id=2), 'This is a note from user Tonyw!'), 
       (DEFAULT, (SELECT id FROM public.user WHERE id=2), (SELECT id FROM job_number WHERE id=3), (SELECT id FROM job_name WHERE id=2), 'This is a note from user Test.');
INSERT INTO address (id, street, city, state, zip, number_id)
VALUES (DEFAULT, '123 Streety', 'Nowhere', DEFAULT, 76008, (SELECT id FROM job_number WHERE id=2)),
       (DEFAULT, '7890 Samford', 'Hereville', DEFAULT, 76118, (SELECT id FROM job_number WHERE id=3));