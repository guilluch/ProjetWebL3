CREATE OR REPLACE FUNCTION getMessagesSentTo(idt NUMERIC)
  RETURNS REFCURSOR AS
$$
DECLARE
  resultat REFCURSOR;
BEGIN
  OPEN resultat FOR SELECT * FROM message m WHERE m.destinataire = idt;
  RETURN resultat;
END;
$$
LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION filtreMessages(debut NUMERIC, fin NUMERIC, idt NUMERIC)
  RETURNS RECORD AS
$$
DECLARE
  resultat REFCURSOR;
BEGIN
  OPEN resultat FOR SELECT * FROM message m WHERE m.id = idt LIMIT fin-debut OFFSET debut;
  RETURN resultat;
END;
$$
LANGUAGE plpgsql;
