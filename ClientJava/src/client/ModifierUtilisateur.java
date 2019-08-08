package client;

import java.awt.BorderLayout;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JTextField;

import service.User;
import service.UserService;
import service.UserService_Service;

public class ModifierUtilisateur extends JFrame implements ActionListener  {
	
	private JLabel lid,lnom,lprenom,llog,lpass;
	private JTextField chid,chnom,chprenom,chlog, chpass;
	private JButton aj,rec,qt;
	private JPanel pan1,pan2,pan3;

	public ModifierUtilisateur() {
		// TODO Auto-generated constructor stub
		lid =new JLabel("Matricule:");
		lnom= new JLabel("Nom:");
		lprenom= new JLabel("Prenom:");
		llog= new JLabel("Login: ");
		lpass=new JLabel("Mot de passe:");
		chpass= new JTextField();
		chid= new JTextField(40);
		chnom=new JTextField();
		chprenom = new JTextField();
		chlog = new JTextField();
		aj = new JButton("Enregistrer");
		rec = new JButton("Rechercher");
		qt = new JButton("Quitter");
		aj.addActionListener(this);
		rec.addActionListener(this);
		qt.addActionListener(this);
		pan1=new JPanel();
		pan2=new JPanel();
		pan3 = new JPanel();
		pan1.setLayout(new GridLayout(1,3));
		pan1.add(lid);
		pan1.add(chid);
		pan1.add(rec);
		pan2.setLayout(new GridLayout(4,2));
		pan2.add(lnom);
		pan2.add(chnom);
		pan2.add(lprenom);
		pan2.add(chprenom);
		pan2.add(llog);
		pan2.add(chlog);;
		pan3.add(aj);
		pan3.add(qt);
		add(pan1,BorderLayout.NORTH);
		add(pan2,BorderLayout.CENTER);
		add(pan3,BorderLayout.SOUTH);
		setTitle("Client TCP Swing Gestion des Employes");
		setSize(650,200);
		setLocationRelativeTo(null);
		setVisible(true);
	}
	
	public void actionPerformed(ActionEvent e)
	{
		UserService userService = new UserService_Service().getUserServicePort();
		 
		   if (e.getSource()==rec)
		   {
			   User user = new User();
			   try
			   {
				if (user==null)
					System.out.println("employe inexistant!!!");
				else
				{
					chid.setText(String.valueOf(user.getId()));
					chid.setEnabled(false);
					chnom.setText(user.getNom());
					chprenom.setText(user.getPrenom());
					chlog.setText(user.getLogin());
				}
			    
			   }
			   catch(Exception ex)
			   {
				   System.out.println(ex.getMessage());
			   }
				   		   
		   }
		   else
		   if (e.getSource()==aj)
		 {
			   User user = new User();
	            String nom = chnom.getText();
	            String prenom = chprenom.getText();
	            String login = chlog.getText();
	            userService.updateUser(nom, prenom, login,user.getId());
	            

	            
		}
		
		else
				if (e.getSource()==qt)
				{
					
					dispose();
					new Accueil();
				   
				}	
	}
	


	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
		new ModifierUtilisateur();

	}

}
