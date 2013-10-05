package com.UT.lambsos;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.Bundle;
import android.telephony.SmsManager;
import android.telephony.TelephonyManager;
import android.util.Log;
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MovilLamb extends Activity {
Button emergencia, parto, consejo, camino;
EditText nombre;
String detalle, latitud, longitud, remitente, id, paciente;
String numeroDestino = "67006819";
private LocationManager locationManager;
private LocationListener locationListener;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_movil_lamb);
			
		
		remitente = getPhoneNumber();
		
		emergencia = (Button) findViewById(R.id.btEmergencia);
		parto =(Button) findViewById(R.id.btParto);
		consejo = (Button) findViewById(R.id.btConsejo);
		camino = (Button) findViewById(R.id.btCamino);
		nombre = (EditText) findViewById(R.id.etPaciente);
		
		parto.setBackgroundColor(getResources().getColor(R.color.Amarillo));
		emergencia.setBackgroundColor(getResources().getColor(R.color.Rojo));
		camino.setBackgroundColor(getResources().getColor(R.color.Verde));
		consejo.setBackgroundColor(getResources().getColor(R.color.VerdeDark));
		emergencia.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View v) {
				// emergencia
				if(!obtenerNombre()){
					paciente= "Sin Nombre";
				}
				//obtenerGPS();
				actualizarPosicion();
				detalle = "1";
				try{
				enviarsms(numeroDestino,paciente +" "+detalle+" "+latitud+" "+longitud+" "+remitente);
				}
				catch(Exception e){
					Toast.makeText(MovilLamb.this, "Fue aki", Toast.LENGTH_LONG).show();
				}
			}
		}); 
		
		parto.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View v) {
				// parto
				if(!obtenerNombre()){
					paciente= "Sin Nombre";
				}
				//obtenerGPS();
				actualizarPosicion();
				detalle = "2";
				try{
					enviarsms(numeroDestino,paciente +" "+detalle+" "+latitud+" "+longitud+" "+remitente);
					}
					catch(Exception e){
						Toast.makeText(MovilLamb.this, "Fue aki", Toast.LENGTH_LONG).show();
					}}
		}); 
		
		consejo.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View v) {
				// TODO Auto-generated method stub
				Intent i = new Intent(MovilLamb.this, VerConsejo.class);
				startActivity(i);
			}
		}); 
		
		camino.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View v) {
				// en camino
				if(!obtenerNombre()){
					paciente= "Sin Nombre";
				}
				//obtenerGPS();
				actualizarPosicion();
				detalle = "3";
				try{
					enviarsms(numeroDestino,paciente +" "+detalle+" "+latitud+" "+longitud+" "+remitente);
					}
					catch(Exception e){
						Toast.makeText(MovilLamb.this, "Fue aki", Toast.LENGTH_LONG).show();
					}
			}
		}); 
		
	}
	
	
	 private Boolean obtenerNombre(){
		if(nombre.getText().toString() != ""){
			paciente = nombre.getText().toString(); 
			return true ;
		}else 
		{
			Toast.makeText(this, "Se enviara la alerta\npero debe agregar el mensaje.", Toast.LENGTH_LONG).show();
			return false;
		}
	
	}
	private void obtenerGPS(){
		
		try{
		LocationManager locationManager = (LocationManager)getSystemService(Context.LOCATION_SERVICE);
		
//		//creamos nuestro listener de GPS
//		DemoLocationListener gpsListener = new DemoLocationListener(latitud, longitud);
//		//asignamos el listener de GPS
//		locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 0, 0, gpsListener);
		
		//creamos nuestro listener de GPS
		DemoLocationListener netListener = new DemoLocationListener(latitud, longitud);
		//asignamos el listener de GPS
		locationManager.requestLocationUpdates(LocationManager.NETWORK_PROVIDER, 0, 0, netListener);
		}
		catch(Exception e){
			Toast.makeText(this, e.toString(), Toast.LENGTH_LONG).show();
		}
			
	}
	
	
	private void enviarsms (String numero, String mensaje){
		SmsManager sms = SmsManager.getDefault();
		sms.sendTextMessage(numero, null, mensaje, null, null);
		Toast.makeText(this, "Enviado a:" + numero , Toast.LENGTH_LONG).show();
		
		}
	
	
	private String getPhoneNumber(){
		  TelephonyManager mTelephonyManager;
		  mTelephonyManager = (TelephonyManager) getSystemService(Context.TELEPHONY_SERVICE); 
		  return mTelephonyManager.getLine1Number();
		}
	
	
	//-----------------------------------------
	private void actualizarPosicion()
    {
    	//Obtenemos una referencia al LocationManager
    	locationManager = (LocationManager)getSystemService(Context.LOCATION_SERVICE);
    	
    	//Obtenemos la última posición conocida
    	Location location = locationManager.getLastKnownLocation(LocationManager.NETWORK_PROVIDER);
    	
    	//Mostramos la última posición conocida
    	muestraPosicion(location);
    	
    	//Nos registramos para recibir actualizaciones de la posición
    	locationListener = new LocationListener() {
	    	public void onLocationChanged(Location location) {
	    		muestraPosicion(location);
	    	}
	    	public void onProviderDisabled(String provider){
	    		//lblEstado.setText("Provider OFF");
	    	}
	    	public void onProviderEnabled(String provider){
	    		//lblEstado.setText("Provider ON");
	    	}
	    	public void onStatusChanged(String provider, int status, Bundle extras){
	    		//Log.i("LocAndroid", "Provider Status: " + status);
	    		//lblEstado.setText("Provider Status: " + status);
	    	}
    	};
    	
    	locationManager.requestLocationUpdates(LocationManager.NETWORK_PROVIDER, 15000, 0, locationListener);
    }
     
    private void muestraPosicion(Location loc) {
    	if(loc != null)
    	{
//    		lblLatitud.setText("Latitud: " + String.valueOf(loc.getLatitude()));
//    		lblLongitud.setText("Longitud: " + String.valueOf(loc.getLongitude()));
//    		lblPrecision.setText("Precision: " + String.valueOf(loc.getAccuracy()));
    		latitud = String.valueOf(loc.getLatitude());
    		longitud = String.valueOf(loc.getLongitude());
    		
    		Log.i("LocAndroid", String.valueOf(loc.getLatitude() + " - " + String.valueOf(loc.getLongitude())));
    	}
    	else
    	{
//    		lblLatitud.setText("Latitud: (sin_datos)");
//    		lblLongitud.setText("Longitud: (sin_datos)");
//    		lblPrecision.setText("Precision: (sin_datos)");
    	}
    }
	
	
	
	
	
	
	//...........................
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.movil_lamb, menu);
		return true;
	}

}
