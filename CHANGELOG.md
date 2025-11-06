# Changelog

Todas as mudanças notáveis neste projeto serão documentadas neste arquivo.

O formato é baseado em [Keep a Changelog](https://keepachangelog.com/pt-BR/1.0.0/),
e este projeto adere ao [Semantic Versioning](https://semver.org/lang/pt-BR/).

## [Unreleased]

### Added
- Documentação técnica completa em português no README.md
- Configuração completa de ferramentas de qualidade de código:
  - PHPUnit para testes automatizados
  - PHPStan (nível 8) para análise estática
  - PHPCS (PSR-12) para padrões de codificação
  - PHPMD para detecção de code smells
- Workflow CI/CD unificado (.github/workflows/ci.yml) com:
  - Testes em múltiplas versões PHP (8.0, 8.1, 8.2)
  - Testes em múltiplas versões Laravel (9.x, 10.x)
  - Validação automática de code quality
  - Auto-fix de code style
- Scripts Composer para execução local das ferramentas
- Atualização de dependências para PHP 8.0+

### Changed
- Requisitos mínimos atualizados para PHP 8.0+
- Workflows antigos substituídos por pipeline CI/CD moderno

### Fixed
- Correção de configurações de análise estática
- Padronização de código seguindo PSR-12

## [1.0.0] - [Data anterior]

### Added
- Sistema modular de gestão de habilidades (Skills)
- Sistema de inventário físico (Items, Equipment, Accessories, Weapons)
- Sistema de relações sociais (Positions, Relations, Genders)
- Sistema de categorias e tags multilíngue
- Sistema de medições científicas padronizadas
- Sistema de preferências e gostos
- Integração com ecossistema SierraTecnologia (Muleta, Pedreiro, Telefonica)
- Suporte a feature gates para ativação condicional de módulos
- Relacionamentos polimórficos para máxima flexibilidade
- Estruturas hierárquicas (parent-child) em múltiplos models
- 21 modelos Eloquent organizados por domínio
- 7 controllers CRUD automatizados
- 10 migrations com suporte a feature gates
- Service Provider com auto-discovery Laravel

[Unreleased]: https://github.com/SierraTecnologia/Informate/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/SierraTecnologia/Informate/releases/tag/v1.0.0
