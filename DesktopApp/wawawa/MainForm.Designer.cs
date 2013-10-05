/*
 * Created by SharpDevelop.
 * User: LaiFISC
 * Date: 04/10/2013
 * Time: 12:32
 * 
 * To change this template use Tools | Options | Coding | Edit Standard Headers.
 */
namespace wawawa
{
	partial class MainForm
	{
		/// <summary>
		/// Designer variable used to keep track of non-visual components.
		/// </summary>
		private System.ComponentModel.IContainer components = null;
		
		/// <summary>
		/// Disposes resources used by the form.
		/// </summary>
		/// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
		protected override void Dispose(bool disposing)
		{
			if (disposing) {
				if (components != null) {
					components.Dispose();
				}
			}
			base.Dispose(disposing);
		}
		
		/// <summary>
		/// This method is required for Windows Forms designer support.
		/// Do not change the method contents inside the source code editor. The Forms designer might
		/// not be able to load this method if it was changed manually.
		/// </summary>
		private void InitializeComponent()
		{
			this.btnConectar = new System.Windows.Forms.Button();
			this.CBoxMensajes = new System.Windows.Forms.ComboBox();
			this.TBoxModem_Info = new System.Windows.Forms.Label();
			this.CBoxComList = new System.Windows.Forms.ComboBox();
			this.lblmensajesMemoria = new System.Windows.Forms.Label();
			this.rtbMensajeMostrado = new System.Windows.Forms.RichTextBox();
			this.label1 = new System.Windows.Forms.Label();
			this.label2 = new System.Windows.Forms.Label();
			this.SuspendLayout();
			// 
			// btnConectar
			// 
			this.btnConectar.Location = new System.Drawing.Point(12, 12);
			this.btnConectar.Name = "btnConectar";
			this.btnConectar.Size = new System.Drawing.Size(75, 23);
			this.btnConectar.TabIndex = 0;
			this.btnConectar.Text = "Conectar";
			this.btnConectar.UseVisualStyleBackColor = true;
			this.btnConectar.Click += new System.EventHandler(this.BtnConectarClick);
			// 
			// CBoxMensajes
			// 
			this.CBoxMensajes.FormattingEnabled = true;
			this.CBoxMensajes.Location = new System.Drawing.Point(56, 54);
			this.CBoxMensajes.Name = "CBoxMensajes";
			this.CBoxMensajes.Size = new System.Drawing.Size(85, 21);
			this.CBoxMensajes.TabIndex = 1;
			this.CBoxMensajes.SelectedIndexChanged += new System.EventHandler(this.CBoxMensajesSelectedIndexChanged);
			// 
			// TBoxModem_Info
			// 
			this.TBoxModem_Info.Location = new System.Drawing.Point(266, 12);
			this.TBoxModem_Info.Name = "TBoxModem_Info";
			this.TBoxModem_Info.Size = new System.Drawing.Size(152, 51);
			this.TBoxModem_Info.TabIndex = 2;
			this.TBoxModem_Info.Text = "label1";
			// 
			// CBoxComList
			// 
			this.CBoxComList.FormattingEnabled = true;
			this.CBoxComList.Location = new System.Drawing.Point(170, 12);
			this.CBoxComList.Name = "CBoxComList";
			this.CBoxComList.Size = new System.Drawing.Size(77, 21);
			this.CBoxComList.TabIndex = 3;
			// 
			// lblmensajesMemoria
			// 
			this.lblmensajesMemoria.Location = new System.Drawing.Point(147, 52);
			this.lblmensajesMemoria.Name = "lblmensajesMemoria";
			this.lblmensajesMemoria.Size = new System.Drawing.Size(176, 23);
			this.lblmensajesMemoria.TabIndex = 4;
			this.lblmensajesMemoria.Text = "label1";
			// 
			// rtbMensajeMostrado
			// 
			this.rtbMensajeMostrado.Font = new System.Drawing.Font("Microsoft Sans Serif", 11F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
			this.rtbMensajeMostrado.Location = new System.Drawing.Point(12, 117);
			this.rtbMensajeMostrado.Name = "rtbMensajeMostrado";
			this.rtbMensajeMostrado.Size = new System.Drawing.Size(332, 118);
			this.rtbMensajeMostrado.TabIndex = 6;
			this.rtbMensajeMostrado.Text = "";
			// 
			// label1
			// 
			this.label1.Location = new System.Drawing.Point(100, 16);
			this.label1.Name = "label1";
			this.label1.Size = new System.Drawing.Size(70, 19);
			this.label1.TabIndex = 7;
			this.label1.Text = "Puerto COM:";
			// 
			// label2
			// 
			this.label2.Location = new System.Drawing.Point(12, 58);
			this.label2.Name = "label2";
			this.label2.Size = new System.Drawing.Size(44, 19);
			this.label2.TabIndex = 8;
			this.label2.Text = "# SMS:";
			// 
			// MainForm
			// 
			this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
			this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
			this.ClientSize = new System.Drawing.Size(439, 261);
			this.Controls.Add(this.label2);
			this.Controls.Add(this.label1);
			this.Controls.Add(this.rtbMensajeMostrado);
			this.Controls.Add(this.lblmensajesMemoria);
			this.Controls.Add(this.CBoxComList);
			this.Controls.Add(this.TBoxModem_Info);
			this.Controls.Add(this.CBoxMensajes);
			this.Controls.Add(this.btnConectar);
			this.Name = "MainForm";
			this.Text = "SMS APP";
			this.Load += new System.EventHandler(this.MainFormLoad);
			this.ResumeLayout(false);
		}
		private System.Windows.Forms.Label label2;
		private System.Windows.Forms.Label label1;
		private System.Windows.Forms.RichTextBox rtbMensajeMostrado;
		private System.Windows.Forms.Label lblmensajesMemoria;
		private System.Windows.Forms.ComboBox CBoxComList;
		private System.Windows.Forms.Label TBoxModem_Info;
		private System.Windows.Forms.ComboBox CBoxMensajes;
		private System.Windows.Forms.Button btnConectar;
	}
}
