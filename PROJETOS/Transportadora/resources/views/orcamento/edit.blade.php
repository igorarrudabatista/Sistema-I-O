@extends('base')

@section('content')
  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText"> Editar Orçamentos</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
    </div>
    <div class="app-content-actions">
      <div class="app-content-actions-wrapper">
        <div class="filter-button-wrapper">
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
          <div class="filter-menu">
            <label>Categoria</label>
            <select>
              <option>Todas as Categorias</option>
              <option>Furniture</option>                 
              <option>Decoration</option>
              <option>Kitchen</option>
              <option>Bathroom</option>
            </select>
            <label>Status</label>
            <select>
              <option> Todos</option>
              <option>Ativo</option>
              <option>Inativo</option>
            </select>
            <div class="filter-menu-buttons">
              <button class="filter-button reset">
                Limpar
              </button>
              <button class="filter-button apply">
                Aplicar
              </button>1
            </div>
          </div>
        </div>
        <button class="action-button list active" title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
      </div>
    </div>
    <div class="products-area-wrapper ">
     


    <form action="/orcamento/update/{{$editar_orcamento->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

  <div class="form-row">

  <div class="col-md-3 mb-4">
      <label for="validationDefault04"> Informe o cliente </label>
      <select  class="form-control">
        <option value="=Não"> Não </option>
      </select>    
    </div> 
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Número do Orçamento </label>
      <input type="text" class="form-control" id="Numero_Orcamento" name="Numero_Orcamento" value= "{{$editar_orcamento->Numero_Orcamento}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Data</label>
      <input type="date" class="form-control" id="Data" name="Data" value= "{{$editar_orcamento->Data}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefaultUsername">Validade</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">Dias</span>
        </div>
        <input type="text" class="form-control" id="Validade" name="Validade" value= "{{$editar_orcamento->Validade}}" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="validationDefault03">Garantia </label>
      <input type="text" class="form-control" id="Garantia" name="Garantia"  value= "{{$editar_orcamento->Garantia}}"  required>
    </div>

    <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="validationDefault03">Forma de Pagamento </label>
      <input type="text" class="form-control" id="Forma_Pagamento" name="Forma_Pagamento" value= "{{$editar_orcamento->Forma_Pagamento}}"  required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault03">Descricao </label>
      <input type="text" class="form-control" id="Descricao" name="Descricao" value= "{{$editar_orcamento->Descricao}}"  required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault03">Quantidade </label>
      <input type="text" class="form-control" id="Quantidade" name="Quantidade" value= "{{$editar_orcamento->Quantidade}}"  required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault03">Valor </label>
      <input type="text" class="form-control" id="Valor" name="Valor"  value= "{{$editar_orcamento->Valor}}" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault03">Desconto </label>
      <input type="text" class="form-control" id="Desconto" name="Desconto" value= "{{$editar_orcamento->Desconto}}" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault03">Taxas </label>
      <input type="text" class="form-control" id="Taxas" name="Taxas"  value= "{{$editar_orcamento->Taxas}}" required>
    </div>
</div>
    
    <div class="col-md-6 mb-4">
    </div>
  <div class="form-group">
    <div class="form-check">
   

      
    
  </div>
  <button class="btn btn-primary" type="submit">Cadastrar Orçamento</button>
</form>



      </div>
    </div>
  </div>
</div>
<!-- partial -->
@endsection