# CRUD - Overdrive (Projeto 1)
Este projeto tem o intuito de ser feito um CRUD em PHP com o paradigma de orientação a objetos.

<h1>Requisitos para a utilização</h1>
1.Xampp (OBS:É necessário utilizar o Xampp pois possui a linguagem PHP, o Apache e o MySQL já instalados.)
<a href="https://www.apachefriends.org/pt_br/index.html">Xampp</a>
2. Git (Opcional) <a href="https://git-scm.com/downloads">Git</a>

# Passo a passo

<h1>Instalação</h1>
<h2>Ambos<h2>
1. Instale o Xampp com o link fornecido acima. (OBS: Lembre-se em qual diretório você está instalando ele)
2. Abra o diretório onde instalou o Xampp e procure pela pasta "htdocs".

<h2>Com o Git</h2>
3. Abra a pasta "htdocs" e clique com o botão direito e selecione a opção "Git Bash Here".
4. Digite a seguinte linha de código no terminal que será exibido: git clone https://github.com/Skyblockfire/CRUD.git

<h2>Sem o Git</h2>
3. Baixe os arquivos do projeto <a href="https://github.com/Skyblockfire/CRUD">aqui</a> como Zip.
4. Abra a pasta "htdocs" do Xamopp e extraia <strong>todos<strong> os arquivos do projeto dentro dela.

<h1>Utilização</h1>
Com todos os arquivos instalados e com o Xampp instalado podemos prosseguir para a utilização.
1. Inicializar o "XAMPP Control Panel" como administrador
2. Clicar em start nos serviços/módulos "Apache" e "MySQL".

# Banco de Dados
Com os serviços/módulos inicializados basta acessar o <a href="http://localhost/phpmyadmin/index.php?route=/server/import">phpmyadmin</a>.

<h1>Instalação do Banco de Dados</h1>
1. Clique em "Choose File".
2. Busque pela pasta "htdocs" novamente.
3. Selecione o arquivo terminado em .sql (overdrive.sql).
4. Clique em importar.

# WEB
Com o banco de dados instalado e o projeto também, basta ir no seu navegador de preferência e digitar "localhost" no espaço de URL.

# Observações
O usuário admin padrão é o CPF: 999999999 SENHA: 1234
Se quiser cadastrar algum usuário é recomendado que utilize algum Client de MySQL. 

Por motivo de segurança não será inserido uma função de adicionar usuários com permissão de administrador direto no sistema.