--
-- PostgreSQL database dump
--

-- Dumped from database version 17.4
-- Dumped by pg_dump version 17.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: tarefa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tarefa (
    id integer NOT NULL,
    nome_task character varying(30) NOT NULL,
    descricao character varying(100),
    ciclos integer,
    dificuldade integer,
    prioridade character varying(10),
    prazo date,
    quadro character varying(10),
    revisao boolean,
    CONSTRAINT tarefa_dificuldade_check CHECK (((dificuldade >= 1) AND (dificuldade <= 5))),
    CONSTRAINT tarefa_prioridade_check CHECK (((prioridade)::text = ANY ((ARRAY['Baixa'::character varying, 'Média'::character varying, 'Alta'::character varying])::text[]))),
    CONSTRAINT tarefa_quadro_check CHECK (((quadro)::text = ANY ((ARRAY['To Do'::character varying, 'Done'::character varying])::text[])))
);


ALTER TABLE public.tarefa OWNER TO postgres;

--
-- Name: tarefa_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tarefa_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tarefa_id_seq OWNER TO postgres;

--
-- Name: tarefa_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tarefa_id_seq OWNED BY public.tarefa.id;


--
-- Name: tarefa id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tarefa ALTER COLUMN id SET DEFAULT nextval('public.tarefa_id_seq'::regclass);


--
-- Data for Name: tarefa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tarefa (id, nome_task, descricao, ciclos, dificuldade, prioridade, prazo, quadro, revisao) FROM stdin;
1	Estudo de Algoritmos	Revisar conceitos de algoritmos e estruturas de dados	10	3	Alta	2025-03-30	To Do	t
2	Desenvolvimento de Site	Criar a homepage do site de um cliente	8	2	Média	2025-03-25	To Do	f
3	Reunião de Equipe	Reunião para alinhamento de tarefas da semana	2	1	Baixa	2025-03-20	Done	f
4	Implementação de API	Desenvolver a API para integração de sistemas	15	4	Alta	2025-04-10	To Do	t
5	Refatoração de Código	Refatorar código antigo para melhorar performance	12	3	Média	2025-03-28	Done	t
\.


--
-- Name: tarefa_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tarefa_id_seq', 5, true);


--
-- Name: tarefa tarefa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tarefa
    ADD CONSTRAINT tarefa_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

