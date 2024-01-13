<div>
    <nav  >
        <ul>
            <li

                    class="{{  request()->is('/') ? 'active' : ''  }}"

            >
                <a href="{{route('panelAdmin.index')}}">
                    Inicio
                </a>
            </li>
            <li
            class="{{  request()->is('productos*') ? 'active' : ''  }}"
            >
                <a href="{{route('producto.index')}}">
                    Productos
                </a>
            </li>
            <li
                class="{{  request()->is('crear_categoras*') ? 'active' : ''  }}"

            >
                <a href="{{route("categorias.index")}}">
                    Categorías
                </a>
            </li>
            <li
            class="{{  request()->is('usuarios*') ? 'active' : ''  }}"
            >
                <a href="{{route('usuario.index')}}">
                    Usuarios

                </a>
            </li>
            <li
            class="{{  request()->is('facturas*') ? 'active' : ''  }}"
            >
                <a href="{{route('facturas.index')}}">
                    Comprobante de compra
                </a>
            </li>
            <li
            class="{{  request()->is('reporte*') ? 'active' : ''  }}"
            >
                <a href="{{route('estadistica.index')}}">
                    Reporte
                </a>
            </li>
        </ul>
    </nav>
    <style>
        nav{
            background-color:  #d35400 ;
             height: 100vh;
            width: 100%;
            display: flex;
            justify-content: start;
            align-items: center;
         }

         nav ul{
            display: flex;
            flex-direction: column;
            list-style: none;
            height: 60%;
            gap: 10px;

         }

         nav ul li{
            max-width: 200px;
            height: 50px;
            transition: all 300ms;

            background-color: rgba(220, 118, 51,.1);
            border-radius: 10px;
            justify-content: center;
            align-items: center;


         }

         nav ul li:hover{
            background-color:  #1c2833  ;
         }
         li.active{
            background-color:  #1c2833  ;
         }
         nav ul li a{
            color: #FFFFFF;
            font-weight: 700;
            text-align: left;

            display: flex;
            align-items:center;
            padding: 20px;
            width: 100%;
            height: 100%;
            text-decoration: none;
            z-index: 1;
         }

    </style>

</div>
