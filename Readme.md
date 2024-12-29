# Sistema de Configuración de Vehículos

Una empresa automotriz necesita desarrollar un sistema de configuración de vehículos que permita a los clientes personalizar y ordenar diferentes tipos de vehículos (autos, motocicletas y camiones). Cada tipo de vehículo tiene múltiples variantes que comparten características comunes, pero poseen particularidades específicas.

## El sistema debe cumplir con los siguientes requerimientos:

## Tipos de Vehículos:

1. Automóviles: Familia de autos con variantes como "compacto", "sedán" y "deportivo".
2. Motocicletas: Tipos como "urbana", "deportiva" y "crucero".
3. Camiones: Variantes como "liviano", "pesado" y "refrigerado".

## Características:

Todos los vehículos tienen características básicas como motor, color, número de ruedas y capacidad de pasajeros.
Cada tipo de vehículo puede tener configuraciones específicas (ejemplo: un camión puede incluir capacidad de carga y una motocicleta puede incluir un sistema de escape personalizado).

## Patrones Creacionales:

La empresa quiere usar un patrón creacional para garantizar que los objetos de vehículos se creen de manera consistente y controlada.
Se debe facilitar la extensibilidad para que, en el futuro, se puedan agregar nuevos tipos de vehículos sin modificar el código existente.

## Requerimientos Técnicos:

Implementar una fábrica para la creación de los vehículos, asegurando que se puedan construir diferentes tipos y variantes.
Opcionalmente, utilizar el patrón Builder si se necesita construir vehículos con pasos específicos.
Garantizar que solo exista una instancia de configuración global usando el patrón Singleton.

## Escenario de Ejemplo:

Un cliente accede al sistema y selecciona un tipo de vehículo (ej. automóvil) y una variante (ej. sedán).
El sistema crea el objeto correspondiente con todas sus características configuradas.
La empresa quiere demostrar que el código puede soportar múltiples tipos y variantes, además de poder ampliarse fácilmente.
