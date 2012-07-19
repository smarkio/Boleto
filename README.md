# TOPICOS  
1. [Como Usar / Testar a biblioteca](#1-como-usar--testar-a-biblioteca)
2. [Reportando Bugs, Pedindo Ajuda e Fazendo Sugestões](#2-reportando-bugs-pedindo-ajuda-e-fazendo-sugest%C3%95es)
3. [Implementando novos Bancos e Carteiras](#3-implementando-novos-bancos-e-carteiras)
4. [Contribuindo com Código em Geral](#4-contribuindo-com-c%C3%93digo-em-geral)
5. [Testes de Unidades (Simple Test)](#5-testes-de-unidades-simple-test)

## 1. COMO USAR / TESTAR A BIBLIOTECA

**_1.1_** Vá até a pasta pública do seu servidor e baixe a biblioteca com o seguinte comando:  
`$ git clone --branch 1.x-dev https://github.com/drupalista-br/boleto.git boleto-lib`  

ou faça o Download da última versão estável em https://github.com/drupalista-br/Boleto/tags

***

**_1.2_** Instale pelo menos um plugin de um banco com os seguintes comandos:  

1. `$ cd boleto-lib`  
2. `$ cd bancos`  
3. `$ git clone --branch 1.x-dev https://github.com/drupalista-br/Boleto-XXX.git XXX`  

Onde XXX deverá ser substituido pelo código do Banco.  

ou faça o Download da última versão estável do plugin em https://github.com/drupalista-br/Boleto/tree/1.x-dev/bancos e:  
         
1. Extraia o arquivo baixado em `../boleto-lib/bancos`
2. Renomeie a pasta extraida com código do Banco ao qual o plugin pertence.  
   Exemplo: `../boleto-lib/bancos/001` para o Banco do Brasil.

***

**_1.3_** No seu navegador gere um boleto de teste acessando o arquivo de teste que esta dentro
da pasta `../boleto-lib/bancos/XXX/NOME_DO_BANCO.test.php`  

Por exemplo:  
`http://localhost/boleto-lib/bancos/001/banco_do_brasil.example.php`  

***       
Cada banco implementado possui um script de examplo dentro da pasta `../boleto-lib/bancos/XXX`.  
Onde XXX é o código do banco.  

Use os arquivos de examplo do(s) banco(s) que você queira integrar à sua aplicação.

## 2. REPORTANDO BUGS, PEDINDO AJUDA E FAZENDO SUGESTÕES

Acesse https://github.com/drupalista-br/boleto-lib/issues

## 3. IMPLEMENTANDO NOVOS BANCOS E CARTEIRAS

Leia também:  

>1. Como Forkear um Repositório e Solicitar Pull Requests no Github: 
   http://help.github.com/fork-a-repo e  
   http://help.github.com/send-pull-requests  

>2. Documentação API:  
   AINDA NÃO DISPONÍVEL  

***
**_3.1_** Você deverá seguir o padrão Doxygen ao comentar o seu Código:  
   http://www.stack.nl/~dimitri/doxygen/docblocks.html  

***      
**_3.2_** Acesse https://github.com/drupalista-br/boleto-lib e clique e "Fork".  

***
**_3.3_** Baixe a sua cópia forkeada com o seguinte comando:  

`$ git clone --branch 1.x-dev git@github.com:USUARIO/boleto.git boleto`  

Onde USUARIO deverá ser substituido pelo seu usuario no Github.  

***
**_3.4_** Dentro da pasta boleto-lib/bancos crie uma subpasta e a nomeia com o código do banco que você irá implementar. Por exemplo:  

`boleto-lib/bancos/237`  

***

**_3.5_** Crie os seguintes arquivos dentro da subpasta que acabou de criar:
       
    (Obrigatório) Banco_XXX.php - Onde XXX é o código do banco.  
    (obrigatório) logo.jpg      - Logo marca do banco.  
    (obrigatório) README.txt    - Instruções sobre a formatação dos campos do  
                                  Boleto para este banco.

                                  Pode-se user README.md ao invés de README.txt  
                                  Saiba mais sobre Markdown em http://github.github.com/github-flavored-markdown
 
    (opcional) layout.tpl.php   - Se este arquivo existir então o template  
                                  padrão será desconsiderado e este template  
                                  será usado. Veja a implementação do Banco do  
                                  Brasil como exemplo.  
    (opcional) style.css        - Mesmo caso do layout.tpl.php. Dê uma olhada na  
                                  implementação do Banco do Brasil como exemplo.  


    (obrigatório) unit-testing/simpletest.php
    
    Este arquivo deverá conter no mínimo o seguinte código:  
    <?php  
    /**  
     * @file  
     * Unit testing.  
     */  

    require_once "../../../unit-testing/boleto.test.php";  
    
    class TestOf104 extends BoletoTestCase{  
      protected $mockingArguments;  
    
      function mockingArguments() {  
        $this->mockingArguments = array(  
           // Adicione aqui os values que influenciam na construção
           // propriedade $boleto->febraban['20-44'].
        );
      }
    }
    
    Onde XXX em TestOfXXX é o código do banco.
    Exemplo:  
    ![Sample code for Simpletest](http://a4.sphotos.ak.fbcdn.net/hphotos-ak-snc7/318763_10151041078913007_339267144_n.jpg)

***

**_3.6_** No arquivo Banco_XXX.php você deverá criar uma classe chamada Banco_XXX  que extends Boleto.  

Por exemplo:  
>class Banco_237 extends Boleto{  
   // Meu código.  
 }  
       
***

**_3.7_** Na classe Banco_XXX que acabara de criar você precisa implementar os seguintes métodos:  

    (opcional)    - setUp()  
    (Obrigatório) - febraban_20to44()  
    (opcional)    - custom()  
    (opcional)    - outputValues()  
    
Dê uma olhada nas implementações já existentes na pasta `../boleto-lib/bancos` para usar como exemplo.
    
***

**_3.8_** Uma vez que fizer o push dos seus commits, acesse `https://github.com/drupalista-br/Boleto/issues`
e crie um issue solicitando a criação e listagem de seu novo repositório para o seu novo plugin caso ainda
não exista.

## 4. CONTRIBUINDO COM CÓDIGO EM GERAL

Leia também
>1. Como Forkear um Repositório e Solicitar Pull Requests no Github  
   [http://help.github.com/fork-a-repo](http://help.github.com/fork-a-repo) e  
   [http://help.github.com/send-pull-requests](http://help.github.com/send-pull-requests)  

>2. Documentação do API:  
   Precisando de um Patrocínio para hospedar o [phpDocumentor](http://www.phpdoc.org)

***         

3. Você deverá seguir o padrão Doxygen ao comentar o seu Código
   [http://www.stack.nl/~dimitri/doxygen/docblocks.html](http://www.stack.nl/~dimitri/doxygen/docblocks.html)

***

**_4.1_** Se você ainda não fez então faça os passos 3.2 e 3.3.

***

**_4.2_** Faça as modificações / correções no código, commit e push para o seu
       repositório Forkeado.
***

**_4.3_** Acesse o seu reposório forkeado no Github e clique em "Pull Request".
    O Pull Request ira criar automaticamente um issue solicitando que o seu código seja mergido.

## 5. TESTES DE UNIDADES (SIMPLE TEST)

Leia também

>1. O que é Simple Test:  
http://pt.wikipedia.org/wiki/SimpleTest e  
http://www.simpletest.org/en/first_test_tutorial.html

![Simpletest for Boleto PHP Library](http://a2.sphotos.ak.fbcdn.net/hphotos-ak-ash4/394649_10151040968123007_358031888_n.jpg)

***

**_5.1_** Como testar

1. Faça o download da biblioteca [Simpletest](http://www.simpletest.org/en/download.html) e
extraia o arquivo compactado para `../boleto-lib/unit-testing/simpletest`  
2. No seu navegador acesse `http://localhost/boleto-lib/bancos/XXX/unit-testing/simpletest.php`.
Onde XXX é o código do banco.  

   Exemplo:  
   `http://localhost/boleto-lib/bancos/104/unit-testing/simpletest.php`

**_5.2_** Onde e Como escrever Testes de Unidades

O código dos Testes de Unidades estão alojados em dois locais. São eles:

1. No arquivo de testes principal em `../boleto-lib/unit-testing/boleto.test.php` e  
2. Nos arquivos localizados nas pastas de cada plugin, `../boleto-lib/bancos/XXX/unit-testing/simpletest.php`.
Onde XXX é o código do banco.
