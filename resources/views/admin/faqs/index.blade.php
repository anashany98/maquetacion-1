@php
    $route="faqs";
    $filters = ['category' => $faqs_categories, 'created_at' => true, 'search' => true]; 
@endphp


@extends('admin.layout.table_form')
    

@section('table')
 
    <table class="table table-sortable">
        <thead>
            <tr>
                <th> Pregunta</th>
                <th>Respuesta</th>
                <th>Categoria</th>
                <th>Fecha</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($faqs as $faq_element)
                <tr>
                    
                    <td>
                        {{$faq_element->title}}
                    </td>
                    
                    <td>
                        {{$faq_element->description}}
                    </td>

                    <td>
                        {{$faq_element->category->name}}
                    </td>
                    <td>
                        {{ Carbon\Carbon::parse($faq_element->created_at)->format('d-m-Y') }}
                    </td>



                    <td>
                        <div class="button-container">

                            <button class="edit" id="edit" data-url="{{route('faqs_show', ['faq' => $faq_element->id ])}}"> 
                                <svg  viewBox="0 0 24 24">
                                <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                </svg>
                            </button>

                            <button class="remove" data-url="{{route('faqs_destroy', ['faq' => $faq_element->id ])}}">
                                <svg  viewBox="0 0 24 24">
                                <path fill="currentColor" d="M20 6.91L17.09 4L12 9.09L6.91 4L4 6.91L9.09 12L4 17.09L6.91 20L12 14.91L17.09 20L20 17.09L14.91 12L20 6.91Z" />
                                </svg>
                            </button>

                        </div>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
        
    </table>

@endsection

@section('form')

    @isset($faq)
        <form class="formulario admin-form" action="{{route("faqs_store")}}">

            {{ csrf_field() }}
            <div class="column">

                <div class="input-container">
                    <input type="hidden" name="id" value="{{isset($faq->id) ? $faq->id : ''}}">
                </div>
                

                <div class="form-group">
                    
                    <div class="label-container">
                        <label for="pregunta">Pregunta:</label>
                    </div>

                    <div class="input-container">
                        <input name="title" type="text" value="{{isset($faq->title) ? $faq->title : ''}}" >
                    </div>
                </div>

                <div class="form-group">

                    <div class="label-container">
                        <label for="respuesta">Respuesta:</label>
                    </div>

                    <div class="input-container">
                        <textarea id="textarea" class="ckeditor" name="description"  type="text" >{{isset($faq->description) ? $faq->description : ''}}</textarea>
                    </div>  
                
                </div> 
                
            </div>
            <div class="column">
                <div class="form-group">
                    <div class="label-container">
                        <label for="category_id" class="label-highlight">
                            Categoría 
                        </label>
                    </div>
                    <div class="input-container">
                        <div class="category_id">
                            
                            <select class="categories" name="category_id"> 
                                <option> </option>

                                @foreach($faqs_categories as $faq_category_element)
                                    <option value="{{$faq_category_element->id}}" {{$faq_category_element->id == $faq->category_id ? 'selected' : ''}}> {{$faq_category_element->name}} </option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="button">
                    <button id="send"> Enviar </button>
                </div>

                <div class="button">
                    <button id="reload" onclick="location.reload()"> Reload </button>
                </div>
            </div>
        </form>
    @endif
@endsection
    
       