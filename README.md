# TOPICOS  
1. Como Usar / Testar a biblioteca
2. Reportando Bugs, Pedindo Ajuda e Fazendo Sugestões
3. Implementando novos Bancos e Carteiras
4. Contribuindo com Código em Geral
5. Testes de Unidades (Simple Test)

## 1. COMO USAR / TESTAR A BIBLIOTECA

1.1 Vá até a pasta pública do seu servidor e baixe a biblioteca com o seguinte comando:  
`$ git clone --branch 1.x-dev https://github.com/drupalista-br/boleto.git boleto-lib`  

ou faça o Download da última versão estável em https://github.com/drupalista-br/Boleto/tags

***      
1.2 Instale pelo menos um plugin de um banco com os seguintes comandos:  

1. `$ cd boleto-lib`  
2. `$ cd bancos`  
3. `$ git clone --branch 1.x-dev https://github.com/drupalista-br/Boleto-XXX.git XXX`  

Onde XXX deverá ser substituido pelo código do Banco.  

ou faça o Download da última versão estável do plugin em https://github.com/drupalista-br/Boleto/tree/1.x-dev/bancos e:  
         
1. Extraia o arquivo baixado em ../boleto-lib/bancos
2. Renomeie a pasta extraida com código do Banco ao qual o plugin pertence.
   Exemplo: ../boleto-lib/bancos/001 para o Banco do Brasil.

***   
1.3 No seu navegador gere um boleto de teste acessando o arquivo de teste que esta dentro da pasta ../boleto-lib/bancos/XXX/NOME-DO-BANCO.test.php  

Por exemplo:  
http://localhost/boleto-lib/bancos/001/banco_do_brasil.example.php  

***       
Cada banco implementado possui um script de examplo dentro da pasta boleto-lib/bancos/XXX.  
Onde XXX é o código do banco.  

Use os arquivos de examplo do(s) banco(s) que você queira integrar à sua aplicação.

## 2. REPORTANDO BUGS, PEDINDO AJUDA E FAZENDO SUGESTÕES

Acesse https://github.com/drupalista-br/boleto-lib/issues

## 3. IMPLEMENTANDO NOVOS BANCOS E CARTEIRAS

Leia também:  

Como Forkear um Repositório e Solicitar Pull Requests no Github  
   http://help.github.com/fork-a-repo e  
   http://help.github.com/send-pull-requests  
               
Documentação API:  
   AINDA NÃO DISPONÍVEL  
               
Você deverá seguir o padrão Doxygen ao comentar o seu Código:  
   http://www.stack.nl/~dimitri/doxygen/docblocks.html  

***      
3.1 Acesse https://github.com/drupalista-br/boleto-lib e clique e "Fork".  

***
3.2 Baixe a sua cópia forkeada com o seguinte comando:  

`$ git clone --branch 1.x-dev git@github.com:USUARIO/boleto.git boleto`  

Onde USUARIO deverá ser substituido pelo seu usuario no Github.  

***
3.3 Dentro da pasta boleto-lib/bancos crie uma subpasta e a nomeia com o código do banco que você irá implementar. Por exemplo:  

`boleto-lib/bancos/237`  

***

3.4 Crie os seguintes arquivos dentro da subpasta que acabou de criar:
       
    (Obrigatório) Banco_XXX.php - Onde XXX é o código do banco.  
    (obrigatório) logo.jpg      - Logo marca do banco.  
    (obrigatório) README.txt    - Instruções sobre a formatação dos campos do  
                                  Boleto para este banco. 
 
    (opcional) layout.tpl.php   - Se este arquivo existir então o template  
                                  padrão será desconsiderado e este template  
                                  será usado. Veja a implementação do Banco do  
                                  Brasil como exemplo.  
    (opcional) style.css        - Mesmo caso do layout.tpl.php. Dê uma olhada na  
                                  implementação do Banco do Brasil como exemplo.  


    (obrigatório) unit-testing/plugin.test.php
    

***

3.5 No arquivo Banco_XXX.php você deverá criar uma classe chamada Banco_XXX  que extends Boleto.  

Por exemplo:
`class Banco_237 extends Boleto{  
   // Meu código.  
 }`  
       
***

3.6 Na classe Banco_XXX que acabara de criar você precisa implementar os seguintes métodos:  

    (opcional)    - setUp()  
    (Obrigatório) - febraban_20to44()  
    (opcional)    - custom()  
    (opcional)    - outputValues()  
    
Dê uma olhada nas implementações já existentes na pasta boleto-lib/bancos para usar como exemplo.
    
***

3.7 Uma vez que fizer o push dos seus commits, acesse https://github.com/drupalista-br/Boleto/issues e crie um issue solicitando a criação de um novo repositório.

## 4. CONTRIBUINDO COM CÓDIGO EM GERAL

Leia também
1. Como Forkear um Repositório e Solicitar Pull Requests no Github
   [http://help.github.com/fork-a-repo](http://help.github.com/fork-a-repo) e
   [http://help.github.com/send-pull-requests](http://help.github.com/send-pull-requests)

2. Documentação API:
   AINDA NAO DISPONÍVEL

***         

3. Você deverá seguir o padrão Doxygen ao comentar o seu Código
   [http://www.stack.nl/~dimitri/doxygen/docblocks.html](http://www.stack.nl/~dimitri/doxygen/docblocks.html)

***

4.1 Se você ainda não fez então faça os passos 3.1 e 3.2.

***

4.2 Faça as modificações / correções no código, commit e push para o seu
       repositório Forkeado.
***

4.3 Acesse o seu reposório forkeado no Github e clique em "Pull Request".
    O Pull Request ira criar automaticamente um issue solicitando que o seu código seja mergido.

## 5. TESTES DE UNIDADES (SIMPLE TEST)

Leia também

    O que é Simple Test:  
       http://pt.wikipedia.org/wiki/SimpleTest e  
       http://www.simpletest.org/en/first_test_tutorial.html

***
### 5.1 Como testar

1. No seu navegador acesse `http://localhost/boleto-lib/unit-testing/boleto.test.php`  
2. Caso queira testar o blugin de um banco especifico acrescente o parâmetro `?bank_code=XXX`.
Onde XXX é o código do banco.

   Exemplo:  
   `http://localhost/boleto-lib/unit-testing/boleto.test.php?bank_code=237`

### Onde e Como escrever Testes de Unidades

O código dos Testes de Unidades estão alojados em dois locais. São eles:

1. No arquivo em `../boleto-lib/unit-testing/boleto.test.php`;  
2. Nos arquivos localizados nas pastas de cada plugin, `../boleto-lib/bancos/XXX/unit-testing/plugin.test.php`.

