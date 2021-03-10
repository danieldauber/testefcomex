# Teste Seleção Fazcomex

Objetivo:

Precisamos fazer uma nova tela de Exportação/Importação para o nosso sistema.
Você precisa criar um formulário para que o usuário selecione entre Exportação ou Importação,
preencha os detalhes do processo e salve no banco de dados.

Também precisa listar os processos salvos.

Resumindo: precisa criar uma tela de listagem e uma tela para inserir o processo.

## Tecnologias
Você pode usar Javascript, PHP para construir o formulário, e pode usar como base a aplicação CakePHP que está nesse repositório. 

Ao terminar, faça um pull request nesse repositório com a sua solução.

## Instalação

1. Tenha PHP na sua máquina instalado. (Pode usar Wamp, Docker). Faça o clone do repositório e execute:

```bash
composer install
```

Pode utilizar também o webserver embutido do CakePHP

```bash
bin/cake server -p 8765
```

## Detalhamento

1. A tela de listagem deve contar uma tabela, listando todos os processos cadastrados,
com o Tipo do Processo, Identificador.

Deve ter um botão para adicionar um novo processo.

2. Na tela de inserir processo, o formulário deve conter os seguintes campos:

Tipo de Processo: selecionar entre Exportação e Importação
Identificador do Processo: recebe letras e números

3.  Caso seja Exportação:

Ao o usuário selecionar Exportação, deve habilitar os seguintes campos:

- Pais de Destino Final: nome do país
- Valor Total da Exportação: numérico|dinheiro

4.  Caso seja Importação:

Ao o usuário selecionar Importação, deve habilitar os seguintes campos:

- Via de Transporte: Marítimo | Aereo | Terrestro
- Peso Bruto da Importação: campo float com 5 casas decimais

Salvar os dados no banco de dados.