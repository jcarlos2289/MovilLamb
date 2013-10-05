package com.UT.lambsos;


import android.app.ListActivity;
import android.database.Cursor;
import android.os.Bundle;
import android.support.v4.widget.SimpleCursorAdapter;
import android.widget.ListView;
import android.widget.Toast;

public class VerConsejo extends ListActivity{

	DataBaseManager database;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		try{
			database = DataBaseManager.instance();
			
			  Cursor ids = database.select("select * from Recomendaciones");
		        ids.moveToFirst();
		        
		       String[] origen = new String[] { ids.getColumnName(0), ids.getColumnName(1)};
			   int[] destino = new int[] { R.id.tvID , R.id.tvTexto};     
			
		        @SuppressWarnings("deprecation")
				SimpleCursorAdapter adapterQuery = new SimpleCursorAdapter(this,R.layout.item_lista, ids, origen, destino);
		        
		        ListView listView = getListView();
				listView.setAdapter(adapterQuery);
			
			
		}catch(Exception e){
			Toast.makeText(this, e.toString(), Toast.LENGTH_LONG).show();
		}
		
	}
	
	
	
}
