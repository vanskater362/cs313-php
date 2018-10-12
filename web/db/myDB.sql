CREATE TABLE public.user
(
   id SERIAL NOT NULL PRIMARY KEY,
   username VARCHAR(100) NOT NULL UNIQUE,
   password VARCHAR(100) NOT NULL
);

CREATE TABLE public.job_name
(
   id SERIAL NOT NULL PRIMARY KEY,
   name VARCHAR(100) NOT NULL
);

CREATE TABLE public.job_number
(
   id SERIAL NOT NULL PRIMARY KEY,
   number VARCHAR(100) NOT NULL UNIQUE,
   name INT NOT NULL REFERENCES public.job_name(id)
);

CREATE TABLE public.notes
(
   id SERIAL NOT NULL PRIMARY KEY,
   user_id INT NOT NULL REFERENCES public.user(id),
   number_id INT NOT NULL REFERENCES public.job_number(id),
   name_id INT NOT NULL REFERENCES public.job_name(id),
   note_text TEXT
);
