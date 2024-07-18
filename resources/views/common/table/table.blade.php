 <div class="data-table-rows slim">
     <!-- Table Start -->
     <div class="data-table-responsive-wrapper">
         <table id="{{ $tableName }}" class="data-table nowrap hover">
             <thead>
                 <tr>
                     @foreach ($tableData as $data)
                         <th class="text-muted text-small text-uppercase">{{ $data }}</th>
                     @endforeach
                 </tr>
             </thead>
         </table>
     </div>
     <!-- Table End -->
 </div>
