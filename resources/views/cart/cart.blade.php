<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100">
            {{ __('Cart') }}
        </h2>
    </x-slot>
            <main class="my-8">
              <div class="container px-6 mx-auto">
                  <div class="flex justify-center my-6">
                      <div class="flex flex-col w-full p-8 text-gray-100 bg-black shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                        @if ($message = Session::get('success'))
                            <div class="p-4 mb-3 bg-green-400 rounded">
                                <p class="text-green-800">{{ $message }}</p>
                            </div>
                        @endif
                          <h3 class="text-3xl font-bold">Carrito</h3>
                        <div class="flex-1">
                          <table class="w-full text-sm lg:text-base" cellspacing="0">
                            <thead>
                              <tr class="h-12 uppercase">
                                <th class="hidden md:table-cell"></th>
                                <th class="text-left">Producto</th>
                                <th class="pl-5 text-left lg:text-right lg:pl-0">
                                  <span class="lg:hidden" title="Quantity">Cantidad</span>
                                  <span class="hidden lg:inline">Cantidad</span>
                                </th>
                                <th class="hidden text-right md:table-cell"> Precio unitario</th>
                                <th class="hidden text-right md:table-cell"> Eliminar </th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                              <tr>
                                <td class="hidden pb-4 md:table-cell">
                                  <a href="#">
                                    <img src="{{ $item->attributes->image_1 }}" class="w-20 rounded" alt="Thumbnail">
                                  </a>
                                </td>
                                <td>
                                  <a href="#">
                                    <p class="mb-2 md:ml-4 text-pink-600 font-bold">{{ $item->name }}</p>
                                    
                                  </a>
                                </td>
                                <td class="justify-center mt-6 md:justify-end md:flex">
                                  <div class="h-10 w-28">
                                    <div class="relative flex flex-row w-full h-8">
                                      
                                      <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id}}" >
                                      <input type="text" name="quantity" value="{{ $item->quantity }}" 
                                      class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-red-600" />
                                      <button class="px-4 mt-1 py-1.5 text-sm rounded rounded shadow text-violet-100 bg-pink-500">Actualizar</button>
                                      </form>
                                    </div>
                                  </div>
                                </td>
                                <td class="hidden text-right md:table-cell">
                                  <span class="text-sm font-medium lg:text-base">
                                      ${{ $item->price }}
                                  </span>
                                </td>
                                <td class="hidden text-right md:table-cell">
                                  <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                    <button class="px-4 py-2 text-white bg-red-600 shadow rounded-full">x</button>
                                </form>
                                  
                                </td>
                              </tr>
                              @endforeach
                               
                            </tbody>
                          </table>
                          <div>
                           Total: ${{ Cart::getTotal() }}
                          </div>
                          <div>
                            <form action="{{ route('cart.clear') }}" method="POST">
                              @csrf
                              <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-red-500">Vaciar el carrito</button>
                            </form>
                          </div>
                          <div><br>
                            <form action="{{ route('cart.buy') }}" method="POST">
                              @csrf
                              <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-purple-500">Pagar</button>
                            </form>
                          </div>
  
  
                        </div>
                      </div>
                    </div>
              </div>
          </main>
  </x-app-layout>