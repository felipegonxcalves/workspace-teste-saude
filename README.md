1ª Passo: git clone https://github.com/felipegonxcalves/workspace-teste-saude.git

2ª Passo: cd api-cadastro

3ª Passo: criar o arquivo .env com as seguintes configs para o Banco de Dados:

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

4ª Passo: docker compose up

5ª Passo: docker compose exec app bash

6ª Passo: composer install



Collections Postman
ENDPOINTS:

POST Cadastrar Perfil
http://localhost:8989/api/perfil
{
    "nome": "Administrador",
    "descricao": "Perfil com todos os acessos disponíveis"
}



GET Listar Usuários
http://localhost:8989/api/usuario


GET Visualizar Usuário
http://localhost:8989/api/usuario/7


PUT Deletar Usuário
http://localhost:8989/api/usuario-delete/7


POST Cadastrar Usuário
http://localhost:8989/api/usuario
{
    "nome": "Felipe Gonçalves Silva Conceição",
    "email": "felipe.goncalves.developer@gmail.com",
    "cpf": "068.519.435-30",
    "id_perfil": 1,
    "enderecos": [
        {
            "logradouro": "Rua joão freitas",
            "numero": 2,
            "bairro": "Nazaré",
            "cep": "40050460",
            "complemento": "Edf. Lobras, apartamento 404",
            "cidade": "Salvador",
            "estado": "BA"
        },
        {
            "logradouro": "Rua nova Castro Alves, Caminho I",
            "numero": 8,
            "bairro": "Centro",
            "cep": "44500000",
            "complemento": "Próximo ao mercadinho jubiaba",
            "cidade": "Castro Alves",
            "estado": "BA"
        }
    ]
}


PUT Alterar Cadastro Usuário
http://localhost:8989/api/usuario/5
{
    "nome": "João dos Santos Silva",
    "email": "joao.silva@gmail.com",
    "cpf": "068.519.435-30",
    "id_perfil": 1,
    "enderecos": [
        {
            "logradouro": "Rua joão freitas",
            "numero": 2,
            "bairro": "Nazaré",
            "cep": "40050460",
            "complemento": "Edf. Lobras, apartamento 404",
            "cidade": "Salvador",
            "estado": "BA"
        }
    ]
}









