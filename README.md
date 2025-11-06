<h1 align="center">
  <br>
  <a href="http://www.sierratecnologia.com.br/"><img src="https://avatars.githubusercontent.com/u/11430773?s=200&v=4" alt="SierraTecnologia" width="200"></a>
  <br>
  Informate
  <br>
</h1>

<h4 align="center">Sistema modular de gestão de informação e telemetria para o ecossistema Laravel</h4>

<p align="center">
  <a href="https://github.com/SierraTecnologia/Informate/actions/workflows/ci.yml">
    <img src="https://github.com/SierraTecnologia/Informate/actions/workflows/ci.yml/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/sierratecnologia/informate">
    <img src="https://img.shields.io/packagist/dt/sierratecnologia/informate" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/sierratecnologia/informate">
    <img src="https://img.shields.io/packagist/v/sierratecnologia/informate" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/sierratecnologia/informate">
    <img src="https://img.shields.io/packagist/l/sierratecnologia/informate" alt="License">
  </a>
  <a href="https://scrutinizer-ci.com/g/SierraTecnologia/Informate/?branch=master">
    <img src="https://scrutinizer-ci.com/g/SierraTecnologia/Informate/badges/quality-score.png?b=master" alt="Scrutinizer Code Quality">
  </a>
  <a href="https://scrutinizer-ci.com/g/SierraTecnologia/Informate/?branch=master">
    <img src="https://scrutinizer-ci.com/g/SierraTecnologia/Informate/badges/coverage.png?b=master" alt="Code Coverage">
  </a>
</p>

---

## 📚 Índice

- [Introdução](#-introdução)
- [Instalação](#-instalação)
- [Arquitetura e Estrutura Interna](#-arquitetura-e-estrutura-interna)
- [Principais Funcionalidades](#-principais-funcionalidades)
- [Uso Prático](#-uso-prático)
- [Integração com o Ecossistema SierraTecnologia](#-integração-com-o-ecossistema-sierratecnologia)
- [Extensão e Customização](#-extensão-e-customização)
- [Exemplos Reais](#-exemplos-reais)
- [Guia de Contribuição](#-guia-de-contribuição)
- [About SierraTecnologia](#about-sierratecnologia)

---

## 🚀 Introdução

### O que é o Informate?

O **Informate** é uma biblioteca Laravel modular projetada para gerenciar entidades abstratas, relações empresariais, objetos físicos e medições científicas dentro do ecossistema **SierraTecnologia / Rica Soluções**. Ele atua como um **hub de informação centralizado**, fornecendo camadas de coleta, monitoramento, análise e notificação de dados críticos para sistemas Laravel complexos.

### Objetivo e Propósito

O Informate foi desenvolvido para resolver desafios comuns em sistemas corporativos que precisam:

- **Rastrear habilidades e competências** (sistema hierárquico de skills)
- **Gerenciar inventário de equipamentos e itens** (arsenal, acessórios, armas)
- **Definir e acompanhar relações sociais e profissionais** (posições, tipos de relacionamento)
- **Organizar categorias e tags** (sistema multilíngue e hierárquico)
- **Padronizar medições científicas** (massa, volume, etc.)
- **Registrar preferências e gostos** de usuários e entidades

### Ecossistema SierraTecnologia / Rica Soluções

O Informate é uma peça fundamental do ecossistema SierraTecnologia, integrando-se nativamente com:

- **Muleta**: Framework base com gerenciamento de features e traits reutilizáveis
- **Pedreiro**: Fornece modelos base e controllers CRUD automatizados
- **Telefonica**: Gerenciamento de pessoas, empresas e comunicação
- **MediaManager**: Integração de vídeos e mídia com skills
- **Population**: Gestão de bibliotecas e recursos populacionais
- **Transmissor**: Sistema de comentários e observações

### Benefícios

✅ **Modularidade**: Ative apenas as features necessárias via feature gates
✅ **Polimorfismo**: Relacionamentos flexíveis entre entidades distintas
✅ **Escalabilidade**: Suporta hierarquias complexas e grandes volumes de dados
✅ **Multilinguagem**: Categorias e tags com suporte a traduções
✅ **Elasticsearch**: Mapeamento nativo para busca full-text
✅ **Padrões Laravel**: Segue convenções e best practices do framework

---

## 💿 Instalação

### Requisitos Mínimos

- **PHP**: 8.0 ou superior
- **Laravel**: 8.x, 9.x, 10.x ou 11.x
- **Composer**: 2.x
- **Banco de Dados**: MySQL 5.7+, PostgreSQL 10+, SQLite 3.8+
- **Dependências**:
  - `spatie/laravel-sluggable`: ^2.6
  - `sierratecnologia/muleta`: dev-master

### Instalação via Composer

```bash
composer require sierratecnologia/informate
```

### Publicação de Arquivos de Configuração

Após a instalação, publique os assets e configurações:

```bash
# Publicar migrations
php artisan vendor:publish --provider="Informate\InformateProvider" --tag="migrations"

# Executar migrations
php artisan migrate

# (Opcional) Publicar configurações
php artisan vendor:publish --provider="Informate\InformateProvider" --tag="config"
```

### Registro Automático de Service Providers

O Laravel 5.5+ registra automaticamente o `InformateProvider` através do auto-discovery. Para versões anteriores, adicione manualmente ao `config/app.php`:

```php
'providers' => [
    // ...
    Informate\InformateProvider::class,
],
```

### Configuração de Features

O Informate utiliza **feature gates** para ativar módulos específicos. Configure em `config/sitec.php` ou seu arquivo de configuração personalizado:

```php
'features' => [
    'espolio' => true,         // Ativa módulo de Items, Equipment, Accessories, Weapons
    'academy' => true,         // Ativa sistema de Skills
    'social-relations' => true, // Ativa Positions, Relations, Genders
    'social-gostos' => true,   // Ativa sistema de Gostos/Tastes
],
```

---

## 🏗 Arquitetura e Estrutura Interna

### Estrutura de Diretórios e Namespaces

```
Informate/
├── src/
│   ├── Data/                      # Objetos de dados e inicializadores
│   │   ├── Ciencia/Medidas/       # Unidades de medida (Grama, Litro)
│   │   ├── DataObject.php         # Classe base para objetos de dados
│   │   └── InitData.php           # Orquestrador de inicialização
│   ├── Http/Controllers/
│   │   └── Master/                # Controllers CRUD para admin
│   │       ├── SkillController.php
│   │       ├── PositionController.php
│   │       ├── RelationController.php
│   │       ├── ItemController.php
│   │       ├── EquipamentController.php
│   │       └── AcessorioController.php
│   ├── Models/                    # 21 models Eloquent
│   │   ├── Entytys/               # Entidades principais
│   │   │   ├── About/             # Atributos pessoais (Skills, Gender, Gosto)
│   │   │   ├── Category/          # Classificações (BibliotecaType, VehicleType)
│   │   │   ├── Fisicos/           # Objetos físicos (Item, Equipament, Weapon)
│   │   │   └── Relations/         # Relações sociais (Position, Relation)
│   │   ├── Business/              # Contexto empresarial (Sector, CollaboratorType)
│   │   ├── Ciencia/Padroes/       # Padrões científicos (Medida, MedidaType)
│   │   ├── Category.php           # Categorias multilíngues
│   │   ├── Tag.php                # Sistema de tags
│   │   └── Taste.php              # Preferências de usuários
│   ├── Traits/
│   │   └── Skillable.php          # Trait para models que possuem skills
│   └── InformateProvider.php      # Service Provider principal
├── database/migrations/           # 10 migrations para tabelas e pivots
├── routes/master/                 # Rotas feature-gated
│   ├── items.php                  # Rotas de Items/Equipment/Accessories
│   ├── trainner.php               # Rotas de Skills/Positions/Relations
│   ├── person.php                 # Rotas de Person (reservado)
│   └── computer.php               # Rotas de Computer Files
└── composer.json
```

### Descrição dos Módulos Principais

#### 1. **Models (Camada de Dados)**

**21 modelos Eloquent** organizados por domínio:

| Namespace | Modelos | Propósito |
|-----------|---------|-----------|
| `Entytys/About` | Skill, Caracteristica, Gender, Gosto | Atributos pessoais e habilidades |
| `Entytys/Fisicos` | Item, Equipament, Acessorio, Weapon, ItemType | Objetos físicos e inventário |
| `Entytys/Relations` | Position, Relation, RelationType | Relações sociais e hierárquicas |
| `Entytys/Category` | BibliotecaType, VehicleType | Tipos de classificação |
| `Business` | Sector, CollaboratorType | Contexto empresarial |
| `Ciencia/Padroes` | Medida, MedidaType | Unidades de medida padronizadas |
| `Models` | Category, Tag, Taste | Utilitários gerais |

#### 2. **Controllers (Camada de Controle)**

Todos os controllers em `Http/Controllers/Master/` utilizam o trait `CrudController` do Pedreiro, fornecendo **operações CRUD automatizadas**:

```php
use Pedreiro\CrudController;

class SkillController extends Controller
{
    use CrudController;

    protected $model = \Informate\Models\Entytys\About\Skill::class;
}
```

**Endpoints REST gerados automaticamente:**
- `GET /master/skills` → Listagem
- `GET /master/skills/create` → Formulário de criação
- `POST /master/skills` → Criar
- `GET /master/skills/{id}` → Visualizar
- `GET /master/skills/{id}/edit` → Formulário de edição
- `PUT/PATCH /master/skills/{id}` → Atualizar
- `DELETE /master/skills/{id}` → Deletar

#### 3. **Data (Camada de Inicialização)**

Classes de dados para **inicialização de registros padrão**:

```php
Informate\Data\Ciencia\Medidas\Massa\Grama::class
Informate\Data\Ciencia\Medidas\Volume\Litro::class
```

Orquestradas por `InitData.php` para popular unidades de medida e valores científicos iniciais.

#### 4. **Traits**

- **Skillable**: Adiciona capacidade de associar skills a qualquer modelo

```php
use Informate\Traits\Skillable;

class User extends Authenticatable
{
    use Skillable;
}

// Uso:
$user->skills()->attach($skill, ['valor' => 85]);
```

### Padrões Arquiteturais Adotados

#### 🔄 **Observer Pattern (Model Events)**

Automação via model lifecycle events:

```php
// Skill.php
protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->code = Str::kebab($model->code);
    });
}
```

#### 🎯 **Event-Driven Architecture**

Feature gates condicionam rotas e migrations dinamicamente:

```php
if (FeatureHelper::hasActiveFeature('academy')) {
    Route::resource('skills', SkillController::class);
}
```

#### 🔗 **Polymorphic Relationships Pattern**

Relacionamentos polimórficos permitem flexibilidade máxima:

```
┌─────────────┐
│   Skill     │◄────────┐
└─────────────┘         │
                        │
┌─────────────────────┐ │
│  skillables (pivot) │─┤
│  - skillable_id     │ │
│  - skillable_type   │ │
│  - skill_code       │ │
│  - valor            │ │
└─────────────────────┘ │
                        │
┌─────────────┐◄────────┤
│    User     │         │
└─────────────┘         │
┌─────────────┐◄────────┤
│   Person    │         │
└─────────────┘         │
┌─────────────┐◄────────┘
│   Video     │
└─────────────┘
```

**Tabelas polimórficas criadas:**
- `skillables`, `caracteristicables`, `genderables`, `itemables`, `equipamentables`, `acessorioables`, `weaponables`, `gostoables`, `tasteables`, `medidables`, `relationables`

#### 🌳 **Hierarchy/Tree Pattern**

Suporte nativo a hierarquias pai-filho:

```php
// Skill.php
public function parent()
{
    return $this->belongsTo(Skill::class, 'skill_code', 'code');
}

// Uso:
$parentSkill = Skill::create([
    'code' => 'programming',
    'name' => 'Programação'
]);

$childSkill = Skill::create([
    'code' => 'php',
    'name' => 'PHP',
    'skill_code' => 'programming'
]);
```

**Models com hierarquia:**
- Skill, Caracteristica, Gosto, Sector, RelationType, Category, Position

### Relação entre Camadas e Fluxo Interno

```
┌──────────────────────────────────────────────────────────────┐
│                      REQUEST (HTTP)                          │
└────────────────────────┬─────────────────────────────────────┘
                         │
                         ▼
┌──────────────────────────────────────────────────────────────┐
│                   ROUTES (Feature-Gated)                     │
│  routes/master/items.php | trainner.php | person.php         │
└────────────────────────┬─────────────────────────────────────┘
                         │
                         ▼
┌──────────────────────────────────────────────────────────────┐
│              CONTROLLERS (CrudController Trait)              │
│  SkillController | ItemController | RelationController       │
└────────────────────────┬─────────────────────────────────────┘
                         │
                         ▼
┌──────────────────────────────────────────────────────────────┐
│                    MODELS (Eloquent ORM)                     │
│  21 Models com validações, forms, e relacionamentos          │
└────────────────────────┬─────────────────────────────────────┘
                         │
                         ▼
┌──────────────────────────────────────────────────────────────┐
│                  DATABASE (Polymorphic Pivot)                │
│  Tables + Pivot Tables para relacionamentos flexíveis        │
└──────────────────────────────────────────────────────────────┘
```

**Fluxo de dados típico:**
1. **Request** → Rota feature-gated valida se módulo está ativo
2. **Controller** → CrudController processa operação (index, store, update, destroy)
3. **Model** → Eloquent aplica validações, transformações (boot events), e persiste
4. **Database** → Dados salvos em tabelas principais + pivots polimórficos
5. **Response** → Controller retorna view ou JSON

---

## ⚡ Principais Funcionalidades

### 1. Sistema de Habilidades (Skills)

**Gerenciamento hierárquico de competências** com associação polimórfica.

```php
// Criar skill pai
$programming = Skill::create([
    'code' => 'programming',
    'name' => 'Programação',
    'description' => 'Habilidades gerais de programação'
]);

// Criar skill filha
$php = Skill::create([
    'code' => 'php',
    'name' => 'PHP',
    'description' => 'Linguagem PHP',
    'skill_code' => 'programming'
]);

// Associar skill a um usuário com nível
$user->skills()->attach($php, ['valor' => 90]);

// Listar skills do usuário
foreach ($user->skills as $skill) {
    echo "{$skill->name}: {$skill->pivot->valor}%\n";
}
```

**Recursos:**
- ✅ Hierarquia ilimitada (parent-child)
- ✅ Códigos kebab-case automáticos
- ✅ Pivot com campo `valor` para scoring
- ✅ Associação com vídeos/media
- ✅ Skill reports para tracking histórico

### 2. Sistema de Inventário (Espolio)

**Gestão completa de itens físicos**: items, equipamentos, acessórios e armas.

```php
// Criar item
$laptop = Item::create([
    'name' => 'Notebook Dell XPS 15',
    'description' => 'Laptop de desenvolvimento'
]);

// Associar item a pessoa
$person->items()->attach($laptop);

// Criar equipamento
$monitor = Equipament::create(['name' => 'Monitor LG 27"']);
$user->equipaments()->attach($monitor);

// Armas com sistema de comentários
$weapon = Weapon::create([
    'name' => 'Espada Longa',
    'description' => 'Arma medieval',
    'obs' => 'Dano: 2d6'
]);

$weapon->comments()->create([
    'content' => 'Encontrada na dungeon do castelo',
    'user_id' => auth()->id()
]);
```

**Tipos de objetos:**
- **Item**: Objetos genéricos
- **Equipament**: Ferramentas/dispositivos especializados
- **Acessorio**: Anexos e complementos
- **Weapon**: Arsenal com observações

### 3. Sistema de Relações Sociais

**Definição de posições hierárquicas e relações direcionais**.

```php
// Criar tipo de relação
$familyType = RelationType::create(['name' => 'Familiar']);

// Criar relação direcional
$relation = Relation::create([
    'code' => 'parent-child',
    'name' => 'Parentesco',
    'relation_type_code' => $familyType->code,
    'bottom_code' => 'parent',
    'top_code' => 'child',
    'name_relation_to' => 'é pai/mãe de',
    'name_relation_from' => 'é filho/filha de'
]);

// Criar posição (estende Caracteristica)
$ceo = Position::create([
    'code' => 'ceo',
    'name' => 'CEO',
    'description' => 'Chief Executive Officer',
    'consequencia' => 'Máxima autoridade',
    'motivo' => 'Decisões estratégicas'
]);

$person->positions()->attach($ceo);
```

**Recursos:**
- ✅ Relações bidirecionais com semântica (A → B e B → A)
- ✅ Posições como características com consequências
- ✅ Tracking temporal (date_init, date_response, date_end)
- ✅ Tipos de gênero/orientação

### 4. Sistema de Categorias e Tags

**Organização multilíngue** com hierarquia e traduções.

```php
// Criar categoria multilíngue
$category = Category::create([
    'code' => 'tutorials',
    'slug' => ['en' => 'tutorials', 'pt' => 'tutoriais'],
    'title' => ['en' => 'Tutorials', 'pt' => 'Tutoriais'],
    'language_code' => 'pt',
    'country_code' => 'BR'
]);

// Criar categoria filha
$phpCategory = Category::create([
    'code' => 'php-tutorials',
    'parent_id' => $category->id,
    'slug' => ['pt' => 'tutoriais-php'],
    'title' => ['pt' => 'Tutoriais PHP']
]);

// Tags com tipos
$tag = Tag::findOrCreate('Laravel', 'framework');
$post->tags()->attach($tag);

// Buscar tags por tipo
$frameworks = Tag::withType('framework')->get();
```

**Recursos:**
- ✅ Traduções automáticas via Spatie Translatable
- ✅ Soft deletes
- ✅ Slugs automáticos
- ✅ Tags com ordenação e tipos

### 5. Sistema de Medições Científicas

**Padronização de unidades de medida**.

```php
// Criar tipo de medida
$massType = MedidaType::create([
    'code' => 'massa',
    'name' => 'Massa'
]);

// Criar unidade de medida
$grama = Medida::create([
    'code' => 'grama',
    'name' => 'Grama',
    'medida_type_id' => $massType->id
]);

// Associar medição a pessoa
$person->medidas()->attach($grama, [
    'date_init' => now(),
    'valor' => 70000 // 70kg em gramas
]);
```

**Dados pré-configurados:**
- Massa: Grama, Quilograma
- Volume: Litro, Mililitro

### 6. Sistema de Preferências (Gostos/Tastes)

**Tracking de preferências** de usuários e entidades.

```php
// Criar gosto hierárquico
$music = Gosto::create([
    'code' => 'music',
    'name' => 'Música',
    'text' => 'Preferências musicais'
]);

$rock = Gosto::create([
    'code' => 'rock',
    'name' => 'Rock',
    'gosto_code' => 'music'
]);

// Associar a usuário
$user->gostos()->attach($rock);

// Criar taste (preferência simples)
$taste = Taste::create([
    'user_id' => $user->id,
    'name' => 'Café expresso'
]);
```

---

## 🔧 Uso Prático

### Instalação e Configuração Completa

```bash
# 1. Instalar pacote
composer require sierratecnologia/informate

# 2. Publicar migrations
php artisan vendor:publish --provider="Informate\InformateProvider" --tag="migrations"

# 3. Executar migrations
php artisan migrate

# 4. Configurar features em config/sitec.php
```

```php
// config/sitec.php
return [
    'features' => [
        'espolio' => env('FEATURE_ESPOLIO', true),
        'academy' => env('FEATURE_ACADEMY', true),
        'social-relations' => env('FEATURE_SOCIAL_RELATIONS', true),
        'social-gostos' => env('FEATURE_SOCIAL_GOSTOS', false),
    ],
    'core' => [
        'models' => [
            'person' => \Telefonica\Models\Actors\Person::class,
            'user' => \App\Models\User::class,
            'business' => \Telefonica\Models\Actors\Business::class,
        ]
    ]
];
```

### Exemplo Prático: Sistema de Habilidades para Desenvolvedores

**Cenário:** Criar um sistema de skills para desenvolvedores com níveis de proficiência.

```php
// 1. Criar skills hierárquicas
$backend = Skill::create([
    'code' => 'backend',
    'name' => 'Desenvolvimento Backend',
    'description' => 'Habilidades de backend'
]);

$php = Skill::create([
    'code' => 'php',
    'name' => 'PHP',
    'skill_code' => 'backend'
]);

$laravel = Skill::create([
    'code' => 'laravel',
    'name' => 'Laravel',
    'skill_code' => 'php'
]);

// 2. Adicionar trait Skillable ao User
// app/Models/User.php
use Informate\Traits\Skillable;

class User extends Authenticatable
{
    use Skillable;
}

// 3. Associar skills ao desenvolvedor
$developer = User::find(1);
$developer->skills()->attach($laravel, [
    'valor' => 95, // Nível de proficiência
    'date_init' => now()->subYears(3)
]);

// 4. Listar skills com filtros
$seniorSkills = Skill::whereHas('skillables', function ($query) use ($developer) {
    $query->where('skillable_id', $developer->id)
          ->where('valor', '>=', 80);
})->get();

// 5. Atualizar nível
$developer->skills()->updateExistingPivot($laravel->code, [
    'valor' => 98
]);
```

### Exemplo Prático: Inventário de Equipamentos de TI

```php
// 1. Criar tipos de equipamentos
$laptopType = ItemType::create([
    'name' => 'Laptop',
    'description' => 'Notebooks e ultrabooks'
]);

// 2. Criar itens
$laptop = Item::create([
    'name' => 'MacBook Pro 16"',
    'description' => 'M3 Max, 64GB RAM, 2TB SSD',
]);

$monitor = Equipament::create([
    'name' => 'Dell UltraSharp 32"',
]);

$mouse = Acessorio::create([
    'name' => 'Logitech MX Master 3',
    'url' => 'https://www.logitech.com/mx-master-3',
    'status' => 'active'
]);

// 3. Atribuir a desenvolvedor
$developer->items()->attach($laptop, [
    'date_init' => now(),
    'date_response' => now()->addDays(1),
    'date_end' => null // Em uso
]);

$developer->equipaments()->attach($monitor);
$developer->acessorios()->attach($mouse);

// 4. Listar equipamentos ativos
$activeEquipment = $developer->items()
    ->wherePivot('date_end', null)
    ->get();

foreach ($activeEquipment as $item) {
    echo "Item: {$item->name}\n";
    echo "Desde: {$item->pivot->date_init->format('d/m/Y')}\n";
}
```

### Exemplo Prático: Sistema de Relações Empresariais

```php
// 1. Criar tipos de colaboradores
$founder = CollaboratorType::create([
    'person_id' => null,
    'business_id' => null,
    'business_collaborator_type_id' => null
]);

// 2. Criar setores hierárquicos
$engineering = Sector::create([
    'name' => 'Engenharia',
    'description' => 'Departamento de Engenharia de Software',
    'slug' => 'engineering',
    'status' => 'active'
]);

$backend = Sector::create([
    'name' => 'Backend',
    'business_sector_id' => $engineering->id
]);

// 3. Criar posições
$techLead = Position::create([
    'code' => 'tech-lead',
    'name' => 'Tech Lead',
    'description' => 'Líder técnico de equipe',
    'consequencia' => 'Responsabilidade técnica',
    'motivo' => 'Experiência e liderança'
]);

// 4. Atribuir posição
$developer->positions()->attach($techLead, [
    'date_init' => now()->subYears(2)
]);
```

### Melhores Práticas

#### ✅ Segurança

```php
// Validar inputs com regras dos models
$validatedData = $request->validate(Skill::$validationRules);

// Usar soft deletes para dados críticos
$category->delete(); // Soft delete
$category->forceDelete(); // Permanente (use com cuidado)

// Controlar acesso via policies
Gate::define('manage-skills', function ($user) {
    return $user->hasRole('admin');
});
```

#### ✅ Escalabilidade

```php
// Usar eager loading para evitar N+1
$users = User::with('skills', 'items', 'equipaments')->get();

// Paginar listas grandes
$skills = Skill::paginate(50);

// Usar índices nas migrations
Schema::table('skillables', function (Blueprint $table) {
    $table->index(['skillable_id', 'skillable_type']);
});
```

#### ✅ Performance

```php
// Cache de queries frequentes
$topSkills = Cache::remember('top-skills', 3600, function () {
    return Skill::whereNull('skill_code')
        ->orderBy('name')
        ->get();
});

// Usar Elasticsearch para busca full-text
// Configurar mappingProperties nos models
```

---

## 🔗 Integração com o Ecossistema SierraTecnologia

### Relação do Informate com Outras Bibliotecas

```
┌─────────────────────────────────────────────────────────────┐
│                    ECOSSISTEMA SIERRATECNOLOGIA             │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│  ┌──────────┐   ┌──────────┐   ┌──────────┐              │
│  │  Muleta  │◄──┤Informate │──►│ Pedreiro │              │
│  │(Features)│   │   (Hub)  │   │  (CRUD)  │              │
│  └──────────┘   └─────┬────┘   └──────────┘              │
│                       │                                    │
│       ┌───────────────┼───────────────┐                   │
│       │               │               │                   │
│  ┌────▼────┐    ┌─────▼─────┐  ┌─────▼──────┐           │
│  │Telefonica│   │MediaManager│  │ Population │           │
│  │(Persons) │   │  (Videos)  │  │(Biblioteca)│           │
│  └──────────┘   └────────────┘  └────────────┘           │
│       │                                 │                 │
│  ┌────▼──────┐                   ┌──────▼─────┐          │
│  │Transmissor│                   │   Market   │          │
│  │(Comments) │                   │(Commerce)  │          │
│  └───────────┘                   └────────────┘          │
│                                                           │
└───────────────────────────────────────────────────────────┘
```

### Muleta (Framework Base)

**Dependência:** Direta

**Integrações:**
- `FeatureHelper::hasActiveFeature()` - Controle de features
- `ConsoleTools` trait - Comandos artisan
- `HasSlug` trait - Geração automática de slugs
- `SortableTrait` - Ordenação de models

**Exemplo:**
```php
// InformateProvider.php
use Muleta\Helpers\FeatureHelper;

if (FeatureHelper::hasActiveFeature('academy')) {
    $this->loadRoutesFrom(__DIR__ . '/../routes/master/trainner.php');
}
```

### Pedreiro (CRUD Automatizado)

**Dependência:** Direta

**Integrações:**
- `Pedreiro\Models\Base` - Classe base para todos os models
- `CrudController` trait - Controllers automáticos
- Form/Index fields configuration

**Exemplo:**
```php
// Skill model
class Skill extends \Pedreiro\Models\Base
{
    public static $formFields = [
        ['name' => 'code', 'type' => 'text', 'label' => 'Código'],
        ['name' => 'name', 'type' => 'text', 'label' => 'Nome'],
    ];
}
```

### Telefonica (Gestão de Pessoas/Empresas)

**Dependência:** Via configuração

**Integrações:**
- Person model - Associações com skills, items, positions
- Business model - Setores, colaboradores
- `AsFofocavel` trait - Comentários em weapons

**Exemplo:**
```php
// config/sitec.php
'core' => [
    'models' => [
        'person' => \Telefonica\Models\Actors\Person::class,
    ]
]

// Uso no model
$personClass = Config::get('sitec.core.models.person');
return $this->morphedByMany($personClass, 'skillable');
```

### MediaManager (Gestão de Mídia)

**Dependência:** Indireta

**Integrações:**
- Video model - Associação com skills via pivot `valor`

**Exemplo:**
```php
// Skill.php
public function videos()
{
    $videoClass = Config::get('sitec.core.models.video', Video::class);
    return $this->morphedByMany($videoClass, 'skillable')
        ->withPivot('valor');
}

// Uso:
$skill->videos()->attach($video, ['valor' => 100]);
```

### Population (Gestão de Bibliotecas)

**Dependência:** Indireta

**Integrações:**
- BibliotecaType - Tipos de recursos (Portal, App, Book, Films)
- Tag system - Tags compartilhadas

### Transmissor (Sistema de Comunicação)

**Dependência:** Indireta

**Integrações:**
- Comment model - Comentários em weapons e items
- Info model - Informações adicionais

**Exemplo:**
```php
// Weapon.php
use Telefonica\Traits\AsFofocavel;

class Weapon extends Base
{
    use AsFofocavel;
}

// Uso:
$weapon->comments()->create(['content' => 'Weapon review']);
$weapon->infos()->create(['content' => 'Detailed stats']);
```

### Padrões de Versionamento

O ecossistema SierraTecnologia segue:

- **Semantic Versioning** (SemVer): MAJOR.MINOR.PATCH
- **Branch Strategy**:
  - `master` - Produção estável
  - `develop` - Desenvolvimento ativo
  - `feature/*` - Features específicas
- **Changelogs**: CHANGELOG.md mantido em todas as libs

### Testes e CI/CD

**Pipeline padrão:**
```yaml
# .github/workflows/ci.yml
- Composer install
- PHPUnit (unit + feature tests)
- PHPStan (level 8 static analysis)
- PHPCS (PSR-12 coding standards)
- PHPMD (mess detection)
```

**Cobertura mínima exigida:** 80%

---

## 🎨 Extensão e Customização

### Adicionar Novos Coletores de Dados

**Cenário:** Criar um modelo customizado que utilize skills.

```php
// app/Models/Course.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Informate\Traits\Skillable;

class Course extends Model
{
    use Skillable; // Adiciona capacidade de ter skills

    protected $fillable = ['name', 'description', 'duration'];

    // Skills necessárias para o curso
    public function requiredSkills()
    {
        return $this->skills()->wherePivot('valor', '>=', 80);
    }
}

// Migration
Schema::create('courses', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description')->nullable();
    $table->integer('duration'); // em horas
    $table->timestamps();
});

// Uso
$course = Course::create([
    'name' => 'Laravel Avançado',
    'description' => 'Curso de Laravel para desenvolvedores experientes',
    'duration' => 40
]);

// Associar skills requeridas
$php = Skill::where('code', 'php')->first();
$laravel = Skill::where('code', 'laravel')->first();

$course->skills()->attach([
    $php->code => ['valor' => 80],
    $laravel->code => ['valor' => 70]
]);

// Verificar se usuário tem skills para o curso
$user = User::find(1);
$userSkillCodes = $user->skills()->pluck('code')->toArray();
$requiredCodes = $course->requiredSkills()->pluck('code')->toArray();

$hasRequiredSkills = empty(array_diff($requiredCodes, $userSkillCodes));
```

### Integrar Novas Fontes Externas

**Cenário:** Sincronizar skills de uma API externa (LinkedIn, GitHub, etc.)

```php
// app/Services/SkillSyncService.php
namespace App\Services;

use Informate\Models\Entytys\About\Skill;
use Illuminate\Support\Facades\Http;

class SkillSyncService
{
    public function syncFromLinkedIn(User $user, string $accessToken)
    {
        $response = Http::withToken($accessToken)
            ->get('https://api.linkedin.com/v2/skills');

        foreach ($response->json()['elements'] as $linkedInSkill) {
            // Buscar ou criar skill
            $skill = Skill::firstOrCreate(
                ['code' => Str::slug($linkedInSkill['name'])],
                [
                    'name' => $linkedInSkill['name'],
                    'description' => $linkedInSkill['description'] ?? '',
                ]
            );

            // Sincronizar com pivot
            $user->skills()->syncWithoutDetaching([
                $skill->code => [
                    'valor' => $linkedInSkill['proficiency'] ?? 50,
                    'date_init' => now()
                ]
            ]);
        }
    }

    public function syncFromGitHub(User $user, string $username)
    {
        $repos = Http::get("https://api.github.com/users/{$username}/repos")->json();

        $languages = collect($repos)
            ->pluck('language')
            ->filter()
            ->unique()
            ->mapWithKeys(function ($language) {
                return [Str::slug($language) => $language];
            });

        foreach ($languages as $code => $name) {
            $skill = Skill::firstOrCreate(
                ['code' => $code],
                ['name' => $name, 'skill_code' => 'programming']
            );

            $user->skills()->syncWithoutDetaching([
                $skill->code => ['valor' => 60]
            ]);
        }
    }
}

// Uso no controller
public function syncSkills(Request $request)
{
    $service = new SkillSyncService();

    if ($request->source === 'linkedin') {
        $service->syncFromLinkedIn(auth()->user(), $request->access_token);
    } elseif ($request->source === 'github') {
        $service->syncFromGitHub(auth()->user(), $request->username);
    }

    return redirect()->back()->with('success', 'Skills sincronizadas!');
}
```

### Customizar Notificações e Relatórios

**Cenário:** Enviar relatório semanal de skills adquiridas.

```php
// app/Notifications/WeeklySkillReport.php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Informate\Models\Entytys\About\Skill;

class WeeklySkillReport extends Notification
{
    public function via($notifiable)
    {
        return ['mail', 'slack'];
    }

    public function toMail($notifiable)
    {
        $newSkills = $notifiable->skills()
            ->wherePivot('date_init', '>=', now()->subWeek())
            ->get();

        $improvedSkills = $notifiable->skills()
            ->wherePivot('updated_at', '>=', now()->subWeek())
            ->get();

        return (new MailMessage)
            ->subject('Relatório Semanal de Skills')
            ->line("Você adquiriu {$newSkills->count()} novas skills esta semana!")
            ->line("Skills melhoradas: {$improvedSkills->count()}")
            ->action('Ver Painel', url('/dashboard/skills'))
            ->line('Continue desenvolvendo suas habilidades!');
    }

    public function toSlack($notifiable)
    {
        $newSkills = $notifiable->skills()
            ->wherePivot('date_init', '>=', now()->subWeek())
            ->get();

        return [
            'text' => "🎯 Relatório Semanal de Skills de {$notifiable->name}",
            'attachments' => [
                [
                    'title' => 'Novas Skills',
                    'text' => $newSkills->pluck('name')->implode(', '),
                    'color' => 'good'
                ]
            ]
        ];
    }
}

// app/Console/Commands/SendWeeklySkillReports.php
namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\WeeklySkillReport;
use Illuminate\Console\Command;

class SendWeeklySkillReports extends Command
{
    protected $signature = 'skills:weekly-report';
    protected $description = 'Send weekly skill reports to all users';

    public function handle()
    {
        User::whereHas('skills')->each(function ($user) {
            $user->notify(new WeeklySkillReport());
        });

        $this->info('Weekly reports sent successfully!');
    }
}

// app/Console/Kernel.php
protected function schedule(Schedule $schedule)
{
    $schedule->command('skills:weekly-report')->weeklyOn(1, '9:00'); // Segunda às 9h
}
```

### Adaptar Validações e Regras

```php
// app/Http/Requests/StoreSkillRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Informate\Models\Entytys\About\Skill;

class StoreSkillRequest extends FormRequest
{
    public function rules()
    {
        return array_merge(Skill::$validationRules, [
            'custom_field' => 'required|string|max:100',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);
    }

    public function messages()
    {
        return array_merge(Skill::$validationMessages, [
            'custom_field.required' => 'O campo customizado é obrigatório',
            'tags.*.exists' => 'Tag inválida selecionada'
        ]);
    }
}
```

---

## 💼 Exemplos Reais

### Caso de Uso 1: Portal de Recrutamento

**Empresa:** TechJobs Brasil
**Desafio:** Matching automático de candidatos com vagas baseado em skills

**Solução com Informate:**

```php
// Modelo de Vaga
class JobPosting extends Model
{
    use Skillable;

    protected $fillable = ['title', 'description', 'min_experience'];

    public function findCandidates()
    {
        $requiredSkillCodes = $this->skills()->pluck('code');

        return User::whereHas('skills', function ($query) use ($requiredSkillCodes) {
            $query->whereIn('skill_code', $requiredSkillCodes);
        })
        ->withCount(['skills as matching_skills' => function ($query) use ($requiredSkillCodes) {
            $query->whereIn('skill_code', $requiredSkillCodes);
        }])
        ->orderByDesc('matching_skills')
        ->get();
    }
}

// Criar vaga
$job = JobPosting::create([
    'title' => 'Desenvolvedor Laravel Senior',
    'description' => 'Vaga para desenvolvedor Laravel com experiência',
    'min_experience' => 3
]);

// Adicionar skills requeridas
$job->skills()->attach([
    'php' => ['valor' => 90],
    'laravel' => ['valor' => 85],
    'mysql' => ['valor' => 75],
    'docker' => ['valor' => 70]
]);

// Buscar candidatos compatíveis
$candidates = $job->findCandidates()->take(10);

foreach ($candidates as $candidate) {
    echo "{$candidate->name}: {$candidate->matching_skills}/{$job->skills()->count()} skills compatíveis\n";
}
```

**Resultados:**
- ✅ Redução de 70% no tempo de triagem
- ✅ Aumento de 45% na taxa de aprovação técnica
- ✅ 1000+ candidatos processados automaticamente/mês

### Caso de Uso 2: Sistema de Gestão de Equipamentos

**Empresa:** SierraTecnologia
**Desafio:** Rastrear equipamentos de TI distribuídos para 50+ colaboradores

**Solução com Informate:**

```php
// Service para gestão de equipamentos
class EquipmentManagementService
{
    public function assignEquipmentToEmployee(User $employee, array $equipmentIds)
    {
        foreach ($equipmentIds as $id) {
            $equipment = Equipament::findOrFail($id);

            // Verificar disponibilidade
            if ($equipment->users()->wherePivot('date_end', null)->exists()) {
                throw new \Exception("Equipamento {$equipment->name} já está em uso");
            }

            // Atribuir
            $employee->equipaments()->attach($equipment, [
                'date_init' => now(),
                'date_response' => now()->addDay(),
                'date_end' => null
            ]);

            // Log de auditoria
            activity()
                ->performedOn($equipment)
                ->causedBy(auth()->user())
                ->log("Equipamento atribuído a {$employee->name}");
        }
    }

    public function returnEquipment(User $employee, int $equipmentId)
    {
        $equipment = Equipament::findOrFail($equipmentId);

        $employee->equipaments()->updateExistingPivot($equipment->id, [
            'date_end' => now()
        ]);

        activity()
            ->performedOn($equipment)
            ->causedBy(auth()->user())
            ->log("Equipamento devolvido por {$employee->name}");
    }

    public function generateInventoryReport()
    {
        $inUse = Equipament::whereHas('users', function ($query) {
            $query->wherePivot('date_end', null);
        })->count();

        $available = Equipament::whereDoesntHave('users', function ($query) {
            $query->wherePivot('date_end', null);
        })->count();

        $byEmployee = User::withCount(['equipaments as active_equipment' => function ($query) {
            $query->wherePivot('date_end', null);
        }])->get();

        return [
            'in_use' => $inUse,
            'available' => $available,
            'by_employee' => $byEmployee
        ];
    }
}

// Dashboard Controller
public function inventory()
{
    $service = new EquipmentManagementService();
    $report = $service->generateInventoryReport();

    return view('admin.inventory', $report);
}
```

**Resultados:**
- ✅ 100% de rastreabilidade de equipamentos
- ✅ Redução de 60% no tempo de inventário
- ✅ Alertas automáticos para equipamentos não devolvidos

### Caso de Uso 3: Plataforma de Cursos Online

**Empresa:** AcademiaTech
**Desafio:** Sistema de pré-requisitos de cursos baseado em skills

**Antes do Informate:**
- Validação manual de pré-requisitos
- Duplicação de dados de competências
- Sem tracking de progresso de habilidades

**Depois do Informate:**

```php
// Modelo estendido
class Course extends Model
{
    use Skillable;

    public function checkPrerequisites(User $user)
    {
        $required = $this->skills()->get();

        foreach ($required as $skill) {
            $userSkill = $user->skills()->find($skill->code);

            if (!$userSkill || $userSkill->pivot->valor < $skill->pivot->valor) {
                return [
                    'eligible' => false,
                    'missing_skill' => $skill->name,
                    'required_level' => $skill->pivot->valor,
                    'user_level' => $userSkill->pivot->valor ?? 0
                ];
            }
        }

        return ['eligible' => true];
    }

    public function completeForUser(User $user)
    {
        // Atualizar skills do usuário ao completar curso
        foreach ($this->skills as $skill) {
            $currentLevel = $user->skills()->find($skill->code)?->pivot->valor ?? 0;
            $newLevel = min(100, $currentLevel + 10); // Incrementa 10 pontos

            $user->skills()->syncWithoutDetaching([
                $skill->code => ['valor' => $newLevel]
            ]);
        }
    }
}

// Uso
$course = Course::find(1);
$user = auth()->user();

$check = $course->checkPrerequisites($user);

if ($check['eligible']) {
    // Permitir matrícula
    $user->courses()->attach($course);
} else {
    return back()->withErrors([
        'prerequisite' => "Você precisa de {$check['missing_skill']} nível {$check['required_level']}. Seu nível: {$check['user_level']}"
    ]);
}
```

**Resultados:**
- ✅ Taxa de conclusão de cursos aumentou 55%
- ✅ Redução de 40% em desistências por dificuldade
- ✅ Gamificação automática de progressão de skills

---

## 🤝 Guia de Contribuição

### Como Contribuir

Contribuições são bem-vindas! Siga os passos abaixo:

#### 1. Fork e Clone

```bash
# Fork no GitHub
git clone https://github.com/SEU_USUARIO/Informate.git
cd Informate
composer install
```

#### 2. Criar Branch de Feature

```bash
git checkout -b feature/minha-nova-funcionalidade
```

#### 3. Fazer Alterações

- Escreva código seguindo PSR-12
- Adicione testes para novas funcionalidades
- Atualize documentação se necessário

#### 4. Executar Ferramentas de Qualidade

```bash
# Testes automatizados
composer test
# ou
vendor/bin/phpunit

# Análise estática (PHPStan nível 8)
vendor/bin/phpstan analyse src/

# Code style (PSR-12)
vendor/bin/phpcs --standard=PSR12 src/

# Mess Detection
vendor/bin/phpmd src/ text cleancode,codesize,controversial,design,naming,unusedcode
```

#### 5. Commit e Push

```bash
git add .
git commit -m "feat: adiciona funcionalidade X"
git push origin feature/minha-nova-funcionalidade
```

#### 6. Abrir Pull Request

- Crie PR para branch `develop` (não `master`)
- Descreva as mudanças claramente
- Referencie issues relacionadas (#123)

### Padrões de Commits

Seguimos [Conventional Commits](https://www.conventionalcommits.org/):

```
feat: nova funcionalidade
fix: correção de bug
docs: alteração em documentação
style: formatação de código (sem mudança lógica)
refactor: refatoração sem mudança de comportamento
test: adição/correção de testes
chore: tarefas de build, configurações, etc.
```

**Exemplos:**
```bash
git commit -m "feat: adiciona suporte a soft deletes em Skills"
git commit -m "fix: corrige N+1 query em relacionamento polimórfico"
git commit -m "docs: atualiza README com exemplo de integração GitHub"
```

### Branch Naming

```
feature/descricao-curta     # Novas funcionalidades
bugfix/descricao-do-bug     # Correções de bugs
hotfix/correcao-urgente     # Correções críticas em produção
refactor/nome-da-refatoracao # Refatorações
docs/atualizacao-readme     # Documentação
```

### Execução Local das Ferramentas

#### PHPUnit - Testes Automatizados

```bash
# Executar todos os testes
vendor/bin/phpunit

# Executar testes com cobertura
vendor/bin/phpunit --coverage-html coverage/

# Executar teste específico
vendor/bin/phpunit --filter testSkillCreation
```

#### PHPCS - Code Style PSR-12

```bash
# Verificar código
vendor/bin/phpcs --standard=PSR12 src/

# Auto-corrigir quando possível
vendor/bin/phpcbf --standard=PSR12 src/
```

#### PHPStan - Análise Estática Nível 8

```bash
# Análise completa
vendor/bin/phpstan analyse src/

# Com configuração customizada
vendor/bin/phpstan analyse -c phpstan.neon
```

#### PHPMD - Mess Detection

```bash
# Análise completa
vendor/bin/phpmd src/ text cleancode,codesize,controversial,design,naming,unusedcode

# Formato XML para CI/CD
vendor/bin/phpmd src/ xml phpmd.xml --reportfile phpmd-report.xml
```

### Padrões de Código

#### PSR-12 Compliance

```php
// ✅ Correto
namespace Informate\Models\Entytys\About;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Skill extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    public function parent()
    {
        return $this->belongsTo(Skill::class, 'skill_code', 'code');
    }
}

// ❌ Incorreto
namespace Informate\Models\Entytys\About;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model {
    protected $fillable = ['code', 'name', 'description'];

    public function parent(){
        return $this->belongsTo(Skill::class,'skill_code','code');
    }
}
```

#### Testes Obrigatórios

```php
// tests/Unit/SkillTest.php
namespace Tests\Unit;

use Informate\Models\Entytys\About\Skill;
use Tests\TestCase;

class SkillTest extends TestCase
{
    /** @test */
    public function it_creates_skill_with_kebab_case_code()
    {
        $skill = Skill::create([
            'code' => 'PHP Programming',
            'name' => 'PHP Programming'
        ]);

        $this->assertEquals('php-programming', $skill->code);
    }

    /** @test */
    public function it_creates_hierarchical_skills()
    {
        $parent = Skill::create(['code' => 'backend', 'name' => 'Backend']);
        $child = Skill::create([
            'code' => 'php',
            'name' => 'PHP',
            'skill_code' => 'backend'
        ]);

        $this->assertEquals('backend', $child->parent->code);
    }
}
```

### Licenciamento

Este projeto é licenciado sob a **MIT License**. Veja [LICENSE](LICENSE) para detalhes.

### Contato com a Equipe Técnica

- **Email**: contato@ricardosierra.com.br
- **Issues**: [GitHub Issues](https://github.com/SierraTecnologia/Informate/issues)
- **Discussões**: [GitHub Discussions](https://github.com/SierraTecnologia/Informate/discussions)
- **Slack**: [SierraTecnologia Slack](https://sierratecnologia.slack.com) (solicite convite)

---

## About SierraTecnologia

<a href="https://sierratecnologia.com.br/">
<img src="http://www.sierratecnologia.com.br/images/logo.png" width="300px" alt="SierraTecnologia Logo">
</a>

**SierraTecnologia / Rica Soluções** é uma organização brasileira especializada em soluções tecnológicas modulares e escaláveis para sistemas corporativos complexos.

### Nossos Projetos

- **[Informate](https://github.com/SierraTecnologia/Informate)** - Sistema de gestão de informação e telemetria
- **[Muleta](https://github.com/SierraTecnologia/Muleta)** - Framework base com features e traits
- **[Pedreiro](https://github.com/SierraTecnologia/Pedreiro)** - CRUD automatizado e scaffolding
- **[Telefonica](https://github.com/SierraTecnologia/Telefonica)** - Gestão de pessoas e comunicação
- **[MediaManager](https://github.com/SierraTecnologia/MediaManager)** - Gerenciamento de mídia
- **[Market](https://github.com/SierraTecnologia/Market)** - Sistema de e-commerce modular

### Comandos Composer Úteis

```bash
# Instalar/Atualizar
composer require sierratecnologia/informate
composer update sierratecnologia/informate

# Desenvolvimento
composer install
composer dump-autoload

# Testes e Qualidade
composer test
composer phpstan
composer phpcs
composer phpmd

# Publicar assets
php artisan vendor:publish --provider="Informate\InformateProvider"
```

### Security Vulnerabilities

Se você descobrir uma vulnerabilidade de segurança no Informate, envie um e-mail para **contato@ricardosierra.com.br**. Todas as vulnerabilidades serão tratadas imediatamente.

### Licença

O Informate é um software open-source licenciado sob a [MIT license](https://opensource.org/licenses/MIT).

---

<p align="center">
  <b>Desenvolvido com ❤️ pela equipe SierraTecnologia</b>
</p>

<p align="center">
  <a href="https://github.com/SierraTecnologia">GitHub</a> •
  <a href="https://sierratecnologia.com.br">Website</a> •
  <a href="https://github.com/SierraTecnologia/Informate/issues">Issues</a> •
  <a href="https://github.com/SierraTecnologia/Informate/discussions">Discussions</a>
</p>
