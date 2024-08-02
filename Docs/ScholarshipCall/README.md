## 1. Descripción

El modelo de Gestión de ScholarshipCall se encarga de administrar todos los aspectos relacionados con las convocatorias de becas, incluyendo usuarios, becas y solicitantes. Esto incluye la creación, actualización, consulta y eliminación de convocatorias de becas, así como la gestión de usuarios y solicitantes asociados.

**Contexto Delimitado: Gestión de ScholarshipCall**

## 2. Arquitectura DDD

### 2.1. Capas de la Arquitectura

#### 2.1.1. Capa de Presentación

**Controladores** - **ScholarshipCallController**: Encargado de gestionar las operaciones CRUD (Crear, Leer, Actualizar, Eliminar) para las convocatorias de becas en el sistema. Utiliza la interfaz `IScholarshipCallService` para delegar las operaciones de negocio y expone los siguientes endpoints HTTP: un `GET` para obtener todas las convocatorias de becas, un `GET` con un `ID` para recuperar una convocatoria específica, un `POST` para agregar una nueva convocatoria, un `PUT` con un `ID` para actualizar una convocatoria existente, y un `DELETE` con un `ID` para eliminar una convocatoria. Cada método maneja respuestas HTTP apropiadas, incluyendo códigos de estado y mensajes de error cuando es necesario, asegurando una interacción clara y eficiente con el sistema. - **ApplicantController**: Gestiona las operaciones CRUD para los solicitantes del sistema mediante la interfaz `IApplicantService`. Proporciona los siguientes endpoints HTTP: un `GET` para listar todos los solicitantes, un `GET` con un `ID` para obtener detalles de un solicitante específico, un `POST` para agregar un nuevo solicitante, un `PUT` con un `ID` para actualizar un solicitante existente, y un `DELETE` con un `ID` para eliminar un solicitante. Los métodos garantizan respuestas HTTP adecuadas, reflejando el éxito o fracaso de las operaciones, y proporcionando mensajes de error cuando es necesario. - **UserController**: Maneja las operaciones relacionadas con los usuarios del sistema utilizando `IUserService` para delegar la lógica de negocio. Ofrece los siguientes endpoints HTTP: un `GET` para obtener todos los usuarios, un `GET` con un `ID` para recuperar la información de un usuario específico, un `POST` para registrar un nuevo usuario, un `PUT` con un `ID` para actualizar los datos de un usuario existente, y un `DELETE` con un `ID` para eliminar un usuario. Los métodos aseguran respuestas HTTP adecuadas para cada operación, proporcionando mensajes de error y códigos de estado apropiados para facilitar la administración y acceso a los datos de los usuarios. - **ScholarshipController**: Responsable de manejar las operaciones CRUD para las becas disponibles en el sistema mediante la interfaz `IScholarshipService`. Ofrece los siguientes endpoints HTTP: un `GET` para listar todas las becas, un `GET` con un `ID` para obtener detalles de una beca específica, un `POST` para crear una nueva beca, un `PUT` con un `ID` para actualizar una beca existente, y un `DELETE` con un `ID` para eliminar una beca. Los métodos garantizan respuestas HTTP adecuadas, reflejando el éxito o fracaso de las operaciones, y proporcionando mensajes de error cuando es necesario.

#### 2.1.2. Capa de Dominio

**Entidades**

-   **ScholarshipCallModel**: Representa una convocatoria de beca en el sistema, incluyendo propiedades como `Id`, `Name`, `Description`, `StartDate`, `EndDate`, `BecaId` y `Status`.
-   **ApplicantModel**: Entidad que representa a los solicitantes, incluyendo propiedades como `UserId`, `SchoolarshiCallId`, `Status`, y `Start_Date`.
-   **UserModel**: Entidad que representa a los usuarios del sistema, con propiedades como `Id`, `Name`, `Email`, `Role` y `ScholarshipCallID`.
-   **ScholarshipModel**: Representa una beca en el sistema, incluyendo propiedades como `Id`, `Name`, `Description`.

#### 2.1.3. Capa de Repositorio

-   **Implementaciones de Repositorios**
    -   **ScholarshipaRepository**: Implementación de `ScholarshipCallRepository` ayuda a gestionae el acceso a datos para las convocatorias de becas utilizando sqlite y EloquentORM. Proporciona métodos para realizar operaciones CRUD, incluyendo `->all()` para obtener todas las convocatorias de becas, `->find('ID')` para recuperar una convocatoria específica por su ID, `create([])` para crear una nueva convocatoria, `update()` para actualizar una convocatoria existente, y `delete()` para eliminar una convocatoria. Este repositorio garantiza que las operaciones de acceso a datos sean realizadas de manera eficiente y segura, facilitando una gestión efectiva de las convocatorias de becas en el sistema.
    -   **ApplicantRepository**: Implementación de `ApplicantRepository` y se encarga de gestionar el acceso a datos para los solicitantes utilizando sqlite como sistema de almacenamiento y Eloquent como ORM.
    -   **UserRepository**: Implementación de `UserRepository` y gestiona el acceso a datos para los usuarios utilizando SqLite.
    -   **ScholarshipRepository**: Implementa la interfaz `ScholarshipRepository` y maneja el acceso a datos para las becas en el sistema utilizando SqLite.
