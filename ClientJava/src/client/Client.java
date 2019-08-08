package client;

import java.rmi.RemoteException;
import java.util.List;

import service.*;
import service.User;
import service.UserService;
import service.UserService_Service;

public class Client {
	
	 private UserService objetDistant;
	
	public static List<User> getAllUser()
    {
		
		UserService userService = new UserService_Service().getUserServicePort();
        
        return userService.getAllUser();
    }
	
	public static void addUser(String nom, String prenom, String login, String password)
    {
		User user = new User();
		user.setNom(nom);
		user.setPrenom(prenom);
		user.setLogin(login);
		user.setPassword(password);
		

        try
        {
        	UserService userService = new UserService_Service().getUserServicePort();
           
            userService.addUser(nom,prenom,login,password);
        }
        catch (Exception rex)
        {
            System.out.println("Erreur ajout : "+ rex.getMessage());
        }
		
    }
	
	public static User UserLogin(String login, String password) {
		
		UserService userService = new UserService_Service().getUserServicePort();
		return userService.userLogin(login, password);
	}

	public static void main(String[] args) {
		
		
        getAllUser();

	}

}
