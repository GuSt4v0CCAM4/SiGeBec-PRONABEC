## 1. Descripción

El modelo de usuarios se encarga de manejar todas las operaciones relacionadas con la administración de usuarios en el sistema. Esto incluye la creación, actualización, consulta y eliminación de usuarios.

**Contexto Delimitado: Gestión de Usuarios**

## 2. Arquitectura DDD

### 2.1. Capas de la Arquitectura

#### 2.1.1. Capa de Presentación

- **Controladores**
  - **AdminController**: Gestiona las solicitudes HTTP relacionadas con usuarios con el rol de ADMIN. Incluye métodos para crear, actualizar, obtener y eliminar usuarios, delegando la lógica correspondiente a los servicios de aplicación.
  - **ApplicantController**: Gestiona las solicitudes HTTP relacionadas con usuarios con el rol de APPLICANT. Incluye únicamente métodos de lectura (GET), delegando la lógica a los servicios de aplicación.

#### 2.1.2. Capa de Dominio

- **Entidades**
  - **AcademicPerformance**: Enum que define el estado del estudiante en la beca en la cual esta inscrito.
  - **UserModel**: Entidad principal del sistema de gestión de usuarios, que incluye propiedades como Id, Name, Email y RememberKey.
  - **AdminModel**: Entidad derivada de UserModel, que representa al usuario administrador y añade propiedades como PhoneNumber.
  - **StudentModel**: Entidad derivada de UserModel, que representa al usuario aplicante y contiene propiedades como Applicant, Credit, ApplicantScholarShip, y ApplicantScholarShipCall.
  - **ScholarShipModel**: Entidad que almacena información sobre los cursos llevados por el aplicante, incluyendo propiedades como Id, StudentId, y ScholarshipInfo.

- **Agregados**
  - **ApplicantScholarship**: Agrupa entidades y objetos de valor relacionados con los cursos de un aplicante, garantizando la consistencia interna del agregado.

- **Interfaces de Repositorio**
  - **UserRepository**: Define los métodos necesarios para la gestión de usuarios en el repositorio, como AddUser, UpdateUser, GetUserById, y DeleteUser.
  - **ScholarshipRepository**: Define los métodos necesarios para la gestión de cursos en el repositorio, como AddScholarship, UpdateScholarship, GetScholarshipById, y DeleteScholarship.

#### 2.1.3. Capa de Repositorio

- **Implementaciones de Repositorios**
  - **UserRepository**: Implementación concreta de `UserRepository`, que utiliza el contexto de la base de datos para realizar operaciones CRUD sobre los usuarios.
  - **ScholarshipRepository**: Implementación concreta de `ScholarshipRepository`, que utiliza el contexto de la base de datos para realizar operaciones CRUD sobre las becas.

![Diagrama de Arquitectura DDD User](public/images/user.png)
