@if (session()->has('success'))
<div 
class="color-red listed">
    <p>{{ session('success') }}</p>    
</div>        
@endif