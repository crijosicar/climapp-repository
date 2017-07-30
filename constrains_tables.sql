INSERT INTO value_list(
             category, description, value, created_at)
    VALUES ('STATE','Activo', 'A', current_date);

INSERT INTO value_list(
             category, description, value ,created_at)
    VALUES ('STATE','Inactivo', 'I', current_date);

UPDATE person
   SET  id_state= (select id from value_list where category = 'STATE' and value = 'A');
UPDATE city
   SET  id_state= (select id from value_list where category = 'STATE' and value = 'A');


ALTER TABLE city
  ADD CONSTRAINT fk_id_state FOREIGN KEY (id_state) REFERENCES value_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE city_person
  ADD CONSTRAINT fk_id_person FOREIGN KEY (id_person) REFERENCES person (id) ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE city_person
  ADD CONSTRAINT fk_id_city FOREIGN KEY (id_city) REFERENCES city (id) ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE person
  ADD CONSTRAINT fk_id_state FOREIGN KEY (id_state) REFERENCES value_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE person
  ADD CONSTRAINT fk_id_gender FOREIGN KEY (id_gender) REFERENCES value_list (id) ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE person
  ADD CONSTRAINT fk_id_born_city FOREIGN KEY (id_born_city) REFERENCES city (id) ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE person_frecuent_city
  ADD CONSTRAINT person_frecuent_city_pkey PRIMARY KEY (id) USING INDEX TABLESPACE pg_default;
ALTER TABLE person_frecuent_city
  ADD CONSTRAINT fk_id_person FOREIGN KEY (id_person) REFERENCES person (id) ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE person_frecuent_city
  ADD CONSTRAINT fk_id_city FOREIGN KEY (id_city) REFERENCES city (id) ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE t_user
  DROP CONSTRAINT t_user_api_token_unique;
ALTER TABLE t_user
  DROP CONSTRAINT uk_user_name_user;
ALTER TABLE t_user
  ADD CONSTRAINT fk_id_person FOREIGN KEY (id_person) REFERENCES person (id) ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE t_user
  ADD CONSTRAINT uk_api_token_t_user UNIQUE (api_token);
ALTER TABLE t_user
  ADD CONSTRAINT uk_user_name_t_user UNIQUE (user_name);
ALTER TABLE t_user
   ALTER COLUMN id_person SET NOT NULL;

ALTER TABLE user_access
  ADD CONSTRAINT fk_id_user FOREIGN KEY (id_user) REFERENCES t_user (id) ON UPDATE NO ACTION ON DELETE NO ACTION;


