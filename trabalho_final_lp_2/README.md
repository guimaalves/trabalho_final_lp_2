# Sistema de Biblioteca 📚

Sistema web desenvolvido em PHP e MySQL para gerenciamento de uma biblioteca acadêmica.

---

## Funcionalidades

### 👨‍🎓 Alunos
- Cadastro de alunos
- Listagem de alunos
- Edição de alunos
- Exclusão de alunos (apenas se não houver empréstimos em aberto)

### 📖 Livros
- Cadastro de livros
- Associação de livros com áreas
- Controle de disponibilidade
- Status exibido como "Disponível" ou "Emprestado"
- Listagem de livros
- Edição e exclusão

### 🏷️ Áreas
- Cadastro de áreas
- Listagem de áreas
- Edição e exclusão

### 🔄 Reservas / Empréstimos
- Empréstimo de livros
- Seleção de múltiplos livros
- Apenas livros disponíveis aparecem para empréstimo
- Status exibido como "Em andamento" ou "Encerrado"
- Devolução de livros
- Checkbox para selecionar todos os empréstimos na devolução
- Atualização automática de disponibilidade

---

## Tecnologias Utilizadas

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- XAMPP

---

## Estrutura do Projeto

```bash
biblioteca/
│
├── aluno/
├── area/
├── livro/
├── reserva/
├── devolucao/
├── includes/
├── assets/
│   ├── css/
│   ├── js/
│   └── img/
├── sql/
├── config.php
└── index.php
```

---

## Banco de Dados

O banco de dados utilizado chama-se:

```sql
biblioteca
```

Importe o arquivo:

```bash
sql/biblioteca.sql
```

no phpMyAdmin.

---

## Como Executar o Projeto

### 1. Clonar o repositório

```bash
git clone https://github.com/GeovanaS/Biblioteca.git
```

---

### 2. Mover para a pasta do XAMPP

Coloque o projeto dentro da pasta:

```bash
htdocs
```

Exemplo:

```bash
C:/xampp/htdocs/biblioteca
```

---

### 3. Iniciar o XAMPP

Ative:
- Apache
- MySQL

---

### 4. Criar o banco de dados

Abra o phpMyAdmin:

```bash
http://localhost/phpmyadmin
```

Importe o arquivo:

```bash
biblioteca.sql
```

---

### 5. Executar o sistema

Abra no navegador:

```bash
http://localhost/biblioteca
```

---

## Funcionalidades do Sistema

### Cadastro de Livro
- Seleção da área através de selectbox carregada do banco de dados
- Livro inicia automaticamente como disponível

### Reserva de Livros
- Apenas livros disponíveis aparecem para seleção
- Possibilidade de selecionar múltiplos livros por empréstimo
- Data de retirada preenchida automaticamente com a data atual

### Devolução
- Lista apenas empréstimos em aberto
- Checkbox no cabeçalho para selecionar/desmarcar todos
- Atualiza o status da reserva para encerrado
- Atualiza o status do livro para disponível automaticamente

---

## Autora

Projeto desenvolvido por Geovana Silveira.