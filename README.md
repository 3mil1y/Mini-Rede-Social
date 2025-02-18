
# Mini Rede Social

Este trabalho é uma mini rede social, desenvolvida para um trabalho interdisciplinar, feita em PHP.

## Índice

- [Instalação](#instalação)
- [Licença](#licença)

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/3mil1y/Mini-Rede-Social.git

2. Execute o dump da database disponível em trab_inter.sql:
mysql -u seu_usuario -p sua_senha nome_do_banco < trab_inter.sql

3. Altere os dados da DB no arquivo site.config.php disponível na pasta funcoes:
$db = new Database("localhost", "root", "", "trab_inter");

USO:

Possui funcionamento semelhante ao twitter, seguindo um fluxo de criação de contas, logins e  interação com postagens semelhante.
