<a name="top"></a>

## Indice de Contenidos.

- [License](#item1)
- [Configurar Vistas](#item2)
- [Componente button](#item3)
- [Componente modal](#item4)
- [Componente card](#item5)
- [Componente form](#item6)
- [Componente input](#item7)
- [Componente toast](#item8)
- [Componente accordion](#item9)
- [Componente select](#item10)
- [Links Navegadores](#item11)

**`Nota:` App de Facturación, Tienda Online, Presupuestos Creada con PHP8^, Laravel 10, Blade y Bootstrap 5.**

<a name="item1"></a>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

[Subir](#top)

<a name="item2"></a>

## Configurar Vistas

```php
@extends('layouts.plantilla')

@section('title', 'Welcome')

@section('content')
    <main class="container-fluid main-dashboard">
        <h1>Hola mundo</h1>
    </main>
@endsection
```

[Subir](#top)

<a name="item3"></a>

## Componente button

### Llamada al Componente

```php
<x-dom.button></x-dom.button>
```

### Usar Componente

>Tipos de botones.

1. Enlace => `link`
2. Modal => `modal`
3. Button => `button`
4. Close Modal => `closemodal`
4. Listas desplegables => `dropdown`
4. Botón Colapsar => `collapse`

**Añadiendo `type=` en el elemento si no declaras la propiedad se creara por defecto el `type='button'`.**

>Ejemplo :

```php
<x-dom.button type='link'></x-dom.button>
```

>Atributos del botón.

1. Tipo => `type`
2. Estilos Css => `class`
3. Url => `route`
4. Nombre => `name`
5. Tooltip =>
```php
    [
        `position`
        `class`
        `class`
    ]
```
6. id = `id`
7. Posicionamiento de los menu desplegables  => `position`

**`Nota :` El posicionamiento esta configurado para el navegador del header si se utiliza en otro lugar la configuración debe de ser manual.**

>Ejemplo del contenido del botón.

```php
<x-dom.button type='link' route="#">
    Texto a mostrar
</x-dom.button>
```

>Ejemplo del botón modal.

```php
<x-dom.button type='modal' class="btn-primary" name="mi_modal" >
    Texto a mostrar
</x-dom.button>
```

>Ejemplo del botón con tooltip.

```php
<x-dom.button type='button' class="btn-primary" :tooltip="[
    'position' => 'right',
    'class' => 'custom-tooltip',
    'text' => 'Mensaje del tooltip'
]" >
    Texto a mostrar
</x-dom.button>
```

>Ejemplo del botón dropdown.

```php
<x-dom.button type="dropdown" class="btn btn-primary">
    Texto a mostrar
</x-dom.button>
<ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
```

>Ejemplo del botón collapse.

```php
<x-dom.button type="collapse" class="btn btn-primary" name="nombre">
    Texto a mostrar
</x-dom.button>
<div class="collapse" id="name">
  <div class="card card-body">
    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
  </div>
</div>
```

**`Nota :` Con la propiedad `type='link y type='closemodal'` no tiene ninguna clase añadida y el `type='dropdown'` solo contiene la clase `dropdown-toggle` todas las demás incluyen la clase `btn`.**

[Subir](#top)

<a name="item4"></a>

## Componente modal

### Llamada al Componente

```php
<x-dom.modal></x-dom.modal>
```

### Usar Componente

>Atributos del modal.

1. Nombre => `name`
2. Estático => `static`
3. Estilos Css => `class`
4. Habilitar Header => `header`

>Propiedades con nombre del modal.

1. Header => `title`
2. Footer => `footer`

>Atributos con props del modal para formulario.

1. Header => `route`
2. Footer => `method`

>Atributos de las propiedades con nombre del modal.

1. Estilos Css => `class`

>Ejemplo del modal.

```php
<x-dom.modal name="nombre" static="static" header="header" class="modal-dialog-centered">
    <x-slot:title class="bg-dark">
        <h1 class="modal-title fs-5" id="Label">Modal title</h1>
        <x-dom.button type="closemodal" class="btn-close btn-close-white"></x-dom.button>
    </x-slot:title>
    Contenido del modal
    <x-slot:footer>
        <x-dom.button type="closemodal" class="btn btn-secondary">
            Cerrar
        </x-dom.button>
        <x-dom.button class="btn-success">
            Siguiente
        </x-dom.button>
    </x-slot:footer>
</x-dom.modal>
```

[Subir](#top)

<a name="item5"></a>

## Componente card

### Llamada al Componente

```php
<x-dom.card></x-dom.card>
```

### Usar Componente

>Atributos del card.

1. Establece del header => `header`
2. Establece del footer => `footer`
3. Estilos Css => `class`


>Propiedades con nombre del card.

1. Header => `header`
2. Footer => `footer`

>Atributos de las propiedades con nombre del card.

1. Estilos Css => `class`

>Atributos con props del card para formulario.

1. Header => `route`
2. Footer => `method`

>Ejemplo del card.

```php
<x-dom.card header="header" footer="footer" class="text-center">
    <x-slot:header class="pt-5">
        Featured
    </x-slot:header>
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
    <x-slot:footer class="pt-5">
        2 days ago
    </x-slot:footer>
</x-dom.card>
```

[Subir](#top)

<a name="item6"></a>

## Componente form

### Llamada al Componente

```php
<x-dom.form></x-dom.form>
```

### Usar Componente

>Atributos del form.

1. Acción => `route`
2. método => `method`
3. Enctype => `type`

>Ejemplo del form.

```php
<x-dom.form :route="route('welcome')" method="delete">
    Elementos del formulario
</x-dom.form>
```

**El elemento form tiene por defecto el `method="get"` y el atributo `enctype="multipart/form-data"`.**

[Subir](#top)

<a name="item7"></a>

## Componente input

### Llamada al Componente

```php
<x-dom.input></x-dom.input>
```

>Tipos de input.

1. Textarea => `textarea`
2. Text => `text`
3. Hidden => `hidden`

**Añadiendo `type=` en el elemento si no declaras la propiedad se creara por defecto el `type='text'`.**

### Usar Componente

>Atributos del input.

1. Tipo del campo => `type`
2. Texto del label => `label`
3. Nombre del campo => `name`
4. Identificador del campo => `id`
5. Texto a mostrar el campo => `placeholder`
6. Campo de solo lectura => `placeholder`
7. Campo deshabilitado => `disabled`
8. Estilo Css => `class`
9. Valor del campo => `value`

>Ejemplo del input.

```php
<x-dom.input type="text" label="Username" name="username" id="username" placeholder="Username" readonly="readonly" disabled="disabled" class="mb-3" :value="old('username')" datarole="tagsinput"></x-dom.input>
```

[Subir](#top)

<a name="item8"></a>

## Componente toast

### Llamada al Componente

```php
<x-messages.toast></x-messages.toast>
```

### Usar Componente

>Atributos del toast.

1. Tipo del toast => `type`

**Añadiendo `type=` en el elemento si no declaras la propiedad se creara por defecto el `type='info'`.**

>Propiedades con nombre del toast.

1. Header => `title`

>Ejemplo del input.

```php
<x-messages.toast type="danger">
    <x-slot:title>
        Mensaje
    </x-slot:title>
    Mensaje del toast
</x-messages.toast>
```

[Subir](#top)

<a name="item9"></a>

## Componente accordion

### Llamada al Componente

```php
<x-dom.accordion></x-dom.accordion>
```

### Usar Componente

>Atributos del input.

1. Nombre de referencia del acordeón => `name`

>Ejemplo del accordion.

```php
<x-dom.accordion name="settings">
    <x-dom.accordion.accordion-item name="Accordion1">
        <x-slot:title>
            Accordion Item #1
        </x-slot:title>
        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
    </x-dom.accordion.accordion-item>
    <x-dom.accordion.accordion-item name="Accordion2">
        <x-slot:title>
            Accordion Item #2
        </x-slot:title>
        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
    </x-dom.accordion.accordion-item>
</x-dom.accordion>
```

[Subir](#top)

<a name="item10"></a>

## Componente select

### Llamada al Componente

```php
<x-dom.select></x-dom.select>
```

### Usar Componente

>Atributos del select.

1. Identificación => `id`
2. Clase Css => `class`
3. Nombre => `name`
4. Change (JS) => `onchange`
5. Texto de la Opción por defecto => `title`
6. label => `label`

## Componente compuesto

### Llamada al Sub-Componente

```php
<x-dom.select.option></x-dom.select.option>
```

>Atributos del option.

1. Valor => `value`
2. Identificación => `id`
3. Valor de la selección por defecto => `selected`

>Ejemplo del select.

```php
<x-dom.select id="MySelect" class="form-select-lg mb-3"  name="países" onchange="funcion_paises()" title="Open this select menu" label="Selecciona un país">
    <x-dom.select.option value="españa" selected="{{$valor_defecto}}" id="MySelect">España</x-dom.select.option>
    <x-dom.select.option value="francia" selected="{{$valor_defecto}}" id="MySelect">Francia</x-dom.select.option>
    <x-dom.select.option value="portugal" selected="{{$valor_defecto}}" id="MySelect">Portugal</x-dom.select.option>
</x-dom.select>
```

[Subir](#top)

<a name="item11"></a>

## Links Navegadores

>Para añadir botones a la navegación abrimos el archivo `LinksNav.php` en `app\Traits\LinksNav.php` y dentro de los arrays escribimos lo siguiente.

>Hay tres tipos de links :

1. `LinksPages` => Que son los links de navegación del menu header.
2. `LinksApp` => Que son los links de navegación del menu aside.
3. `LinksAuth` => Que los links de navegación de autorización.

```php
[
    'name' => 'Dashboard',
    'slug' => 'dashboard',
    'type' => 'link',
    'route' => route('dashboard'),
    'active' => request()->routeIs('dashboard') ? 'active disabled' : '',
    'icono' => view('components.images.dashboard.dashboard'),
    'icono_color' => '',
    'class' => 'link-menu',
    'tooltip' => [
        'position' => 'right',
        'class' => 'custom-tooltip',
        'text' => 'App main panel'
    ]
],
[
    'name' => 'Courses',
    'slug' => 'courses',
    'type' => 'collapse',
    'position' => 'down',
    'route' => '#courses',
    'active' => '',
    'icono' => '',
    'icono_color' => '',
    'class' => 'nav-link',
    'items' => [
        [
            'name' => 'List Courses',
            'href' => '#',
        ],
        [
            'name' => 'Create Courses',
            'href' => '#',
        ],
    ]
],
[
    'name' => 'Example',
    'slug' => 'example',
    'type' => 'dropdown',
    'position' => 'down',
    'route' => '',
    'active' => '',
    'icono' => '',
    'icono_color' => '',
    'class' => 'nav-link',
    'items' => [
        [
            'name' => 'List Example',
            'href' => '#',
        ],
        [
            'name' => 'Create Example',
            'href' => '#',
        ],
    ]
],
```
**`Nota :` Podemos poner cualquier tipo de botón que se pueda configurar en el componente button.**

**`Nota :` En el menu aside se configuran los botones `dropdown` y la aplicación realiza el cambio a `collapse` automáticamente cuando el menu se desplega.**

[Subir](#top)
