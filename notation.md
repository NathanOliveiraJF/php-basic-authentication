## Authorization

O cabeçalho de requisição http Authorization contém as credenciais para autenticar o agente de usuario com o servidor, geralmente o servidor responderá com um status 401 Unauthorized se não for possível fazer a autenticação, e com cabeçalho WWW-Authenticate 


**Sintaxe**
Authorization: <tipo> <credenciais>

tipo -> O tipo de autenticação
credenciais -> A cadeia de caracteres resultante é uma condificação base64

**Exemplo Basic Authenticate**

<img src="./public/httpauth.png" alt="Basic Authenticate" />

Primeiro é enviado para o servidor o nome do usuário e a senha combinados por dois pontos usuario:senha e esse combinado é codificado em base64 no que resulta em YWxhZGRpbjpvcGVuc2VzYW1l por exemplo.
O servidor vai receber essa base64 e vai ser revertida e o servidor vai pegar as credenciais do usuário, caso as credenciais existirem no servidor, o cliente passa ter acesso ao recurso.  
Basicamente é uma troca de seu usuario e senha com o servidor. Isso torna o Basic Auth não totalmente seguro, necessitando utilizar sobre HTTPS.

Exemplo da solicitação enviada no header para o servidor -> Authorization: Basic YWxhZGRpbjpvcGVuc2VzYW1l


### WWW-Authenticate 
O cabeçalho da resposta HTTP WWW-Authenticate **define o método de autenticação a ser usado** para obter acesso ao recurso

O cabeçalho WWW-Authenticate é enviado junto a resposta 401 Unauthorized


**Sintaxe**

WWW-Authenticate: <type> realm=<realm>


type -> Tipo de autenticação. Um tipo comum de autenticação é Basic
realm -> Uma descrição da area protegida

**Exemplo**

WWW-Authenticate: Basic realm="Acess to the staging site" 


**Exemplo Bearer Authenticate**
<img src="./public/HQF1L.png" alt="Bearer Authenticate" />

A diferença do bearer com o basic é que, no Bearer apesar de solicitar para o usuário as credenciais, não é enviado para o servidor as credenciais em base64 com o formato usuairo:senha, é enviado para o servidor
As credenciais do usuário, o servidor responde para o cliente com um Token, e com esse Token o cliente utiliza para acessar os recursos do servidor.
Então basicamente quem é responsável por gerar um Token para acessar os recursos é o próprio servidor, basta o usuário se autenticar de qualquer forma.

Exemplo da solicitação enviada no header para o servidor -> Authorization: Bearer eyJhbGciOnR5cCI6IkpXVCJ9 


## JWT Tokens

JWT significa Json Web Tokens. JWT é outro tipo de token, similiar ao Bearer Token, o servidor de autenticação emitem token JWT após o login bem-sucedidos dos usuários. O JWT é open-source, então existem muitos projetos
de Código aberto para trabalhar com Tokens JWT, por isso é amplamente utilizado.
