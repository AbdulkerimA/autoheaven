@props(['disabled' => false])

<input 
    @disabled($disabled) 
    {{ 
        $attributes
        ->merge([
            'class' => 'border-yellow-500 focus:border-yellow-600 focus:ring-yellow-600 rounded-md shadow-sm text-white'
            ]) 
    }}
    style="background: rgba(28, 37, 46, 0.8);"
>
