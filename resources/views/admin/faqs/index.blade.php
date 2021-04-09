 @extends('admin.layout.table_form')
    

@section('table')
 
    <table>
        
        <tr>
            <th>ID</th>
            <th>Pregunta</th>
            <th>Respuesta</th>
            <th>Categoria</th>
            <th></th>
        </tr>
        
        @foreach($faqs as $faq_element)
            <tr>
                
                <td>
                    {{$faq_element->id}}
                </td>
                
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
                    <div class="button-container">

                        <button class="edit" data-url="{{route('faqs_show', ['faq' => $faq_element->id ])}}"> 
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

            

    </table>

@endsection

@section('form')

    <form class="formulario admin-form" action="{{route("faqs_store")}}">

        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{isset($faq->id) ? $faq->id : ''}}">

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

        <div class="category-name">
            <select class="category" name="category_id"> 
                <option> </option>
                @foreach($faqs_categories as $faq_category_element)
                <option value="{{$faq_category_element->id}}"> {{$faq_category_element->name}} </option>
                @endforeach
                
            </select>

        </div>


        <div class="button">
            <button id="send"> Enviar </button>
        <div>

        <div class="button">
            <button id="reload" onclick="location.reload()"> Reload </button>
        <div>
        
    </form>

@endsection
    
       