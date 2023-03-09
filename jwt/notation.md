## O que é JMT ? 

Json Web Token(JMT) é um padrão que define uma maneira compacta e segura de transmitir objetos JSON entre duas partes. JMT podem ser assinados utilizando uma chave secreta 

## Estrutura do JMT
JMT é composto por 3 partes, dividas por ponto. Header, payload e signature, sendo cada parte encodada com base64url


### Header
header consiste em duas partes, o tipo de token que é o JWT e o algoritmo de assinatura que pode ser(HMAC, SHA256 ou RSA) 

``
{
  "alg": "HS256",
  "typ": "JWT"
}

``
Essas informações são encodadas em base64


### Payload

A segunda parte do token, que contem as claims. As claims são as declarações sobre uma entidade(normalmente é o usuario) com dados adicionais. Existem 3 tipos de claims: Reserved, Public e Private

Reserved claims: atributos não obrigatórios (mas recomendado) que são usados na validação do token pelos protocolos de segurança das API: Esses atributos são:

- sub: Entidade a quem o token pertence, normalmente o id do usuario
- iss: emissor do token
- exp: timestamp de quando o token irá expirar
- aud: destinatário do token, representa a aplicação que irá usá-lo


Public claims: atributos que usamos em nossas aplicações, normalmente armazenamos as informações do usuário autenticado na aplicação. Exemplos: name, role, permissions etc

Private claims: atributos definidos especialmente para compartilhar informações entre aplicações

Exemplo de um payload

``
{
  "sub": "12321231",
  "name": "Nathan",
  "role": "admin"
}

``
### Signature
Assinatura garante a integridade do token, garantindo que quem gerou tinha a chave secreta e que as informações do payload não foram alteradas, já que mudar o payload irá alterar esta assinatura que precisa de chave para ser gerada.


Então com header, payload e signature forma o token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IlJvZHJpZ28iLCJyb2xlIjoiYWRtaW4ifQ.vqoDiXce_zGG5I81wI2-gbzRq4k2B70UIr1NuZ08Z_4

## Utilizando biblioteca para autenticação JWT

Em php existe uma lib firebase/php-jwt que é bastante simples

