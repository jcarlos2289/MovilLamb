/*
 * Created by SharpDevelop.
 * User: LaiFISC
 * Date: 04/10/2013
 * Time: 12:32
 * 
 * To change this template use Tools | Options | Coding | Edit Standard Headers.
 */
using System;
using System.Collections.Generic;
using System.Drawing;
using System.Windows.Forms;
using System.IO.Ports;
using MySql.Data.MySqlClient;

namespace wawawa
{
	/// <summary>
	/// Description of MainForm.
	/// </summary>
	public partial class MainForm : Form
	{
		public mCore.SMS objSMS = new mCore.SMS();
        public mCore.Inbox objINBOX;
        MySqlConnection con = new MySqlConnection();
        MySqlDataReader rdr = null;
        
       // ConeccionDBServer CServer = new ConeccionDBServer();
        
		public MainForm()
		{
			InitializeComponent();			
		}
			
		public void Conectar()
         {
             try
             {
                 String conecion;
                 conecion = "Server=localhost;Port=3306;Database=movilamb;Uid=root;Pwd=;";

                 con.ConnectionString = conecion;
                 con.Open(); 
                 MessageBox.Show("Conectado a la Base de Datos Server");
                 con.Close();
                 //lol();

             }
             catch (MySqlException q)
             {
             	MessageBox.Show(q.Message + q.ToString(), "Error al Cargar la Base de Datos" );
             }
         }
		
		
		void MainFormLoad(object sender, EventArgs e)
		{
			Conectar();
			if (objSMS.IsConnected == false)
                {
                    CBoxComList.Items.Clear();
                    string[] ports = SerialPort.GetPortNames();
                    foreach (string port in ports)
                    {
                        CBoxComList.Items.Add(port);
                    }
                    if (CBoxComList.Items.Count != 0)
                    {
                        CBoxComList.SelectedIndex = 0;
                        //Con_Des();
                        objINBOX = objSMS.Inbox();
                        ModemConnect();
                    }
                    else
                    {
                        MessageBox.Show("THERE IS NO MODEM CONNECTED");
                    }
                }
                if (objSMS.IsConnected == true)
                {
                    //Auto();
                }
		}
		
		void BtnConectarClick(object sender, EventArgs e)
		{			
			//DeshabilitarBotones();
            if (objSMS.IsConnected == false)
            {
                ModemConnect();
            }
            //Con_Des();
		}
		
		public void ModemConnect()
        {
            try
            {
                TBoxModem_Info.Text = "Connectando ...";
                objSMS.Port = "" + CBoxComList.SelectedItem;
                objSMS.BaudRate = mCore.BaudRate.BaudRate_9600;
                objSMS.DataBits = mCore.DataBits.Eight;
                objSMS.StopBits = mCore.StopBits.One;

//                if (txtPIN.Text != "" )
//                    objSMS.PIN = txtPIN.Text;

                objSMS.Parity = mCore.Parity.None;
                objSMS.FlowControl = mCore.FlowControl.RTS_CTS;
                objSMS.Connect();
                //------------------------------------------------------------
                objINBOX.Concatenate = true;
                objSMS.MessageMemory = mCore.MessageMemory.SM;
                objINBOX.Refresh();

                //txtPIN.Visible = false;
                
                if (objSMS.IsConnected == true)
                {
                    TBoxModem_Info.Text = ">>>>Moden Info<<<<" + "\n";
                    TBoxModem_Info.Text += " Conectado al Puerto COM: " + CBoxComList.SelectedItem;
                    //btnInfo_modem.Enabled = true;
                    Mensajes();
                }
                else
                {
                 //   MessageBox.Show("There was an issue - Could not connect to port " + CBoxComList.SelectedItem + "\nConnection problem with the port" + CBoxComList.SelectedItem);
                }
            }
            catch (mCore.GeneralException ex)
            {
//                if (modo == 1)
//                {
//                    Autoconnect();
//                }
//                else
//                {
//                    MessageBox.Show(ex.Message + "\n\n-Connection Problem-");
//                    TBoxModem_Info.Text = "Connection Problem \nPlease try connecting the Modem";
//                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }	
		
		public void Mensajes()
        {
            objINBOX.Refresh();
            CBoxMensajes.Items.Clear();
            for (int i = 1; i <= objINBOX.Count; i++)
            {
                CBoxMensajes.Items.Add(i);
            }
            lblmensajesMemoria.Text = "Messages in Memory " + CBoxMensajes.Items.Count;
            if (objINBOX.HasMessages)
            {
            	int m = Convert.ToInt32(CBoxMensajes.Text);
				
				DividirMensaje(objINBOX.Message(m).Text + " " + objSMS.Inbox().Message(m).Phone);
                rtbMensajeMostrado.Text = objINBOX.Message(Convert.ToInt32(CBoxMensajes.Text)).Text;
            }
            
            else if (objSMS.Inbox().IsEmpty)
            {
                objINBOX.Refresh();
                Actualizar();
            }
        }
		
		public void Actualizar() 
        {
            if (objINBOX.IsEmpty)
            {
                Mensajes();
            }
        }
			
		public void Eliminar_Mensaje()
        {
			if(CBoxMensajes.Text != ""){
           int i = Convert.ToInt32(CBoxMensajes.Text);
           objSMS.Inbox().Message(i).Delete();
           Mensajes();
			}
        }
		
		void CBoxMensajesSelectedIndexChanged(object sender, EventArgs e)
		{			
			if (CBoxMensajes.Text != "")
			{
				int m = Convert.ToInt32(CBoxMensajes.Text);
				DividirMensaje(objINBOX.Message(m).Text + " " + objSMS.Inbox().Message(m).Phone);
				
			}
		}
		
		string nombre ="";
		Int32 codigo =0;
		string latitud ="";
		string longitud ="";
		string remitente ="";
		
		public void DividirMensaje(string Dato)
        {
			try{
            if (Dato == "0\r")
            { }
            else
            {
                string mensajito = Dato, msg = "";

                char[] delimit = new char[] { ' ' };
                int i = 1;
                foreach (string mensajillo in mensajito.Split(delimit))
                {
                    if (i == 1)
                    {
                        msg = mensajillo + " ";
                        i++;
                    }
                    else
                    {
                        if (i == 2)
                        {         
                        	nombre = msg + mensajillo;
                            msg = "Nombre del Paciente: " + nombre + "\n";
                        	i++;                          
                        }
                        else
                    	{
	                        if (i == 3)
	                        {          
	                        	codigo = Convert.ToInt32(mensajillo);
	                            msg += "Codigo: " + codigo  + "\n";
	                        	i++;                          
	                        }
	                        else
	                    	{
		                        if (i == 4)
		                        {            
		                        	latitud = mensajillo;
		                            msg += "Latitud: " + latitud  + "\n";
		                        	i++;                          
		                        }
	                        	else
		                    	{
			                        if (i == 5)
			                        {            
			                        	longitud = mensajillo;
			                            msg += "Longitud: " + longitud  + "\n";	
										i++;   			                            
			                        }
			                        else 
			                    	{
				                        if (i == 6)
				                        {            
				                        	remitente = mensajillo;
				                            msg += "Remitente: " + remitente;	                        
				                        }
			                        
			                    	}
		                    	}
	                    	}
                    	}
                    }
                }                
            	rtbMensajeMostrado.Text = msg;
            	lol();
            }}
			catch(Exception er)
			{
				rtbMensajeMostrado.Text = "Mensaje Erroneo";				
            Eliminar_Mensaje();    
			}
        }
		 public void lol() 
         {		 	
		 	con.Open();
		 	MySqlCommand command = new MySqlCommand("INSERT INTO recibido(codigo, Nombre, Latitud, Longitud, Numero) VALUES (" + "1,'" + nombre + "', '" +   latitud + "'" + ", '" + longitud + "', '" + remitente + "'" + ")", con);
            command.ExecuteNonQuery();
            con.Close();
            Eliminar_Mensaje();
		 	
		}
				
	}
}
		
		