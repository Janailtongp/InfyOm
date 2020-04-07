# I - Iniciando esse projeto
- 1 - Clone a base de dados:

	`git clone https://github.com/Janailtongp/InfyOm.git`

- 2 - Atualize as dependências:

	`composer update`

- 3 - Crie o arquivo de configurações ".env" e configure a conexão com sua base de dados.
	
	`cp .\.env.example .env`

- 4 - Adicione uma chave ao projeto:
	
	`php artisan key:generate`

- 5 - Execute as migrações:

	`php artisan migrate`

- 6 - Execute o comando: `php artisan serve`

	-- Vá até http://localhost:8000/register

# II - Instalando a InfyOm no seu projeto Laravel
- 1 - Criando um projeto Laravel:

	`composer create-project --prefer-dist laravel/laravel project_name`

- 2 - Configure o .env, adicionando o banco de dados e caso seja necessário. Gere a chave de segurança do projeto com o comando:

	`php artisan key:generate`

- 3 - Adiciona essas dependências no conjunto "require" dentro do compose.json
```php
		"require": {
			"infyomlabs/laravel-generator": "7.0.x-dev",
			"laravelcollective/html": "^6.1",
			"infyomlabs/adminlte-templates": "7.0.x-dev"
		}
```
- 4 - Execute o comando: `composer update`

- 5 - Adiciona as linhas abaixo em "config/app.php":

```php
		'Form'      => Collective\Html\FormFacade::class,
		'Html'      => Collective\Html\HtmlFacade::class,
		'Flash'     => Laracasts\Flash\Flash::class,
```

- 6 - Execute o comando: `php artisan vendor:publish`

	-- Escolha 0 para publicar todos

- 7 - Execute o comando: `php artisan infyom:publish`

	--  Caso deseje, adicione novos campos a migration de User, por exemplo:  CPF, perfil, peso, [...]

	-- Todos os campos adicionados na migration devem ser adicionados também na respectiva model dentro do array $fillable.

- 8 - Execute os comandos:

	`composer require laravel/ui`
	
	`php artisan ui bootstrap --auth`

- 9 - Execute o comando: `php artisan infyom.publish:layout`

- 10 - Execute o comando: `php artisan migrate`

- 11 - Execute o comando: `php artisan serve`

	-- Vá até http://localhost:8000/register

## III - Adicionando um novo CRUD

- 1 - Cria o Json Schema em: 

	https://harish81.github.io/infyom-schema-generator/
	
- 2 - Adicione o Json Schema em: "resources/model_schemas/"

	-- É preciso cria o diretório "model_schemas" caso não exista.

- 3 - Execute o comando: 

`php artisan infyom:scaffold $MODEL --fieldsFile=$SCHEMA_FILE.json`

-- $MODEL é o nome da Model que será criada

-- $SCHEMA_FILE.json é o arquivo .json adicionado em "model_schemas"

## Referências

- https://labs.infyom.com/laravelgenerator/docs/7.0/publish-layout

- https://labs.infyom.com/laravelgenerator/docs/6.0/schema-builder

- https://harish81.github.io/infyom-schema-generator/

- https://github.com/harish81/infyom-schema-generator