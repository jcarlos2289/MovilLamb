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

public class NuevaNumero extends  Activity{
	EditText TaNueva;
	Button Guardar;
	TextView TaActual;
		
	String nueva;
	String tasa;
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
		Cursor curTasa = database.select("select Celular from Celular"); 
        tasa = obtenerValor(curTasa);
        
        TaActual.setText(tasa.toString());
        
		Guardar.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View v) {
				// TODO Auto-generated method stub
		try{
			if (!TaNueva.getText().equals("")){
				nueva =TaNueva.getText().toString();
					
				
				ContentValues valores = new ContentValues();
				valores.put("Celular", nueva);
				
				database.update("Celular", valores, "id = 1" );
				
				
				Toast.makeText(NuevaNumero.this, "Se ha guardado el nuevo numero", Toast.LENGTH_LONG).show();
				
				finish();
			}else{
				Toast.makeText(NuevaNumero.this, "Debes introducir un valor Numérico", Toast.LENGTH_LONG).show();
			}
			
		}catch(Exception e ){
		
			Toast.makeText(NuevaNumero.this, "Ha ocurrido un error", Toast.LENGTH_LONG).show();
		}
			}
		});
		
	}
	 public String obtenerValor(Cursor c){
			String val;
		   
		     try {
		    	 if (c == null){
		    	     	c.close();
		    	     }else
		    	     {
		    	     	c.moveToFirst();
		    	     }
		    
		    	 val = c.getString(0); 
		    	 c.close();
		    	 return val;
		    			 
		     }
		     catch(Exception hj){
		     	 //Toast.makeText(this,hj.toString(), Toast.LENGTH_LONG).show();
		     	 return "";
		     	}	
		     
		}

}
