package com.UT.lambsos;

import android.app.Activity;
import android.content.ContentValues;
import android.database.Cursor;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class NuevaTasa extends Activity{
	EditText TaNueva;
	Button Guardar;
	TextView TaActual;
	Double nueva = 0.0; // es la que inserto en la bd
	Double tasa = 0.0;
	DataBaseManager database;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.nueva_tasa);
		
		TaNueva = (EditText)findViewById(R.id.etTaNueva);
		Guardar=(Button) findViewById(R.id.btGuardar);
		TaActual = (TextView) findViewById(R.id.tvTaActual);
		
		database = DataBaseManager.instance();  
		Cursor curTasa = database.select("select Tasa from Valor"); 
        tasa = obtenerValor(curTasa);
        
        TaActual.setText(tasa.toString());
        
		Guardar.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View v) {
				// TODO Auto-generated method stub
		try{
			if (!TaNueva.getText().equals("")){
				nueva = Double.parseDouble(TaNueva.getText().toString());
					
				
				ContentValues valores = new ContentValues();
				valores.put("Tasa", nueva);
				
				database.update("Valor", valores, "_id = 1" );
				
				
				Toast.makeText(NuevaTasa.this, "Se ha guardado la nueva tasa", Toast.LENGTH_LONG).show();
				
				finish();
			}else{
				Toast.makeText(NuevaTasa.this, "Debes introducir un valor Numérico", Toast.LENGTH_LONG).show();
			}
			
		}catch(Exception e ){
		
			Toast.makeText(NuevaTasa.this, "Ha ocurrido un error", Toast.LENGTH_LONG).show();
		}
			
			
			}
		});
		
	}
	 public double obtenerValor(Cursor c){
			double val;
		   
		     try {
		    	 if (c == null){
		    	     	c.close();
		    	     }else
		    	     {
		    	     	c.moveToFirst();
		    	     }
		    
		    	 val = Double.parseDouble(c.getString(0)); 
		    	 c.close();
		    	 return val;
		    			 
		     }
		     catch(Exception hj){
		     	 //Toast.makeText(this,hj.toString(), Toast.LENGTH_LONG).show();
		     	 return 0;
		     	}	
		     
		}


}
