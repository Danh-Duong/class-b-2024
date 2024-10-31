
<h1>Categories</h1>
@if (session('success'))
    <p class="success">{{ session('success') }}</p>
@endif

@if (session('error'))
    <p class="error">{{ session('error') }}</p>
@endif

<a href="create"><button class="new">+ Create New Category</button></a>

<table>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Action</th>

    </tr>
    @foreach ($items as $category)
    <tr>
      <td>
        <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}
        </a>
      </td>
      <td>{{ $category->description }}</td>
      <td>
        <a href="{{ route('categories.edit', $category->id) }}">
          <button>Edit</button>
        </a>

        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
      </td>

    </tr>
    @endforeach
  </table>

  <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .new{
      margin-bottom: 20px;
      padding: 10px;
      background-color: green;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .success{
      color: green
    }
    .error{
      color: red;
    }
    a{
      text-decoration: none;
    }
</style>
