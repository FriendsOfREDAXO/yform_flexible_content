# YForm flexible content

## :construction: Das Addon befindet sich noch in der Entwicklung und ist noch nicht für den produktiven Einsatz geeignet.

Das Addon fügt flexible Inhalte für YForm hinzu. 
Hierfür wird ein neues YForm Value (`flexible_content`) angeboten, über das beliebig viele Gruppen hinzugefügt werden können, die wiederum beliebig viele Felder verschiedener Typen enthalten können.

Aktuell beschränkt sich das Addon auf die Feldtypen `text`, `textarea`, `link`, `linkList`, `media`, `mediaList`, `select`, `checkbox`, `radio` und `sql`. 

Auf der `textarea` können bisher folgende WYSIWYG-Editoren verwendet werden: `redactor`, `markitup` und `ckeditor`.

Die erstellten Gruppen können dann in YForm Datensätzen eingebunden werden.

Inhalte werden als JSON gespeichert und können über ein Trait einfacher abgerufen werden.
Das Trait entfernt unnötige Daten, die zum Speichern der Inhalte benötigt werden und gibt die Inhalte als Array zurück.

![flexible-screen](https://github.com/eaCe/yform_flexible_content/assets/2708231/68682c09-bb4a-4cb5-b649-0dd45d311976)


## FlexibleContentTrait

Das Trait kann in eigene YForm Model-Klassen eingebunden werden. 
Es fügt die Möglichkeit hinzu, die gespeicherten Inhalte einfacher abzurufen.


```php
class custom_yform_model_class extends \rex_yform_manager_dataset
{
    use FlexibleContentTrait;
    
    // ...
}

custom_yform_model_class::get(1)->getFlexibleContent('field_name');
```

#### Iterator nutzen

```php
class custom_yform_model_class extends \rex_yform_manager_dataset
{
    use FlexibleContentTrait;
    
    // ...
}

$item = custom_yform_model_class::query()->findId(1);
$groups = $item->getIterableFlexibleContent('field_name');

while ($groups->hasNext()) {
    $group = $groups->current();

    while ($group->hasNext()) {
        $field = $group->current();

        dump($field);

        $field->next();
    }

    $groups->next();
}
```