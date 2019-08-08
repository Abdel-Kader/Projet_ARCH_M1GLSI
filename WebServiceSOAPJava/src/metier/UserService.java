package metier;

import java.nio.charset.StandardCharsets;
import java.util.ArrayList;
import java.util.List;

import java.security.DigestInputStream;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

import javax.jws.WebParam;
import javax.jws.WebService;

import domaine.User;
import dao.UserDAO;

@WebService(serviceName = "UserService")


public class UserService
{
    private static ArrayList<User> users = new ArrayList<User>();
    UserDAO userDAO = new UserDAO();


    public User userLogin(
            @WebParam(name = "login") String login,
            @WebParam(name = "password") String password) throws NoSuchAlgorithmException
    {
        MessageDigest md = MessageDigest.getInstance("MD5");
        byte[] hashInBytes = md.digest(password.getBytes(StandardCharsets.UTF_8));

        StringBuilder sb = new StringBuilder();
        for (byte b : hashInBytes) {
            sb.append(String.format("%02x", b));
        }

        if(userDAO.userLogin(login, sb.toString()) == null)
        {
            return null;
        }
        else
        {
            return userDAO.userLogin(login, sb.toString());
        }
    }



    public List<User> getAllUser ()
    {
        return userDAO.getAllUser();
    }



    public String addUser(
            @WebParam(name = "nom") String nom,
            @WebParam(name = "prenom") String prenom,
            @WebParam(name = "login") String login,
            @WebParam(name = "password") String password) throws NoSuchAlgorithmException
    {

        MessageDigest md = MessageDigest.getInstance("MD5");
        byte[] hashInBytes = md.digest(password.getBytes(StandardCharsets.UTF_8));

        StringBuilder sb = new StringBuilder();
        for (byte b : hashInBytes) {
            sb.append(String.format("%02x", b));
        }
        User user = new User(nom, prenom, login, sb.toString());
        try
        {
            userDAO.addUser(user);
            return String.format("Utilisateur ajouté avec succès !");
        }
        catch(Exception e)
        {
            return String.format(e.getMessage());
        }

    }

    public String updateUser(
            @WebParam(name = "nom") String nom,
            @WebParam(name = "prenom") String prenom,
            @WebParam(name = "login") String login,
            @WebParam(name = "iduser") int iduser)
    {
        User user = new User(nom, prenom, login, iduser);
        try
        {
            userDAO.updateUser(user);
            return String.format("Utilisateur modifié avec succès");
        }
        catch (Exception e)
        {
            return String.format(e.getMessage());
        }
    }

    public String deleteUser(@WebParam(name = "id") int iduser)
    {
        try
        {
            userDAO.deleteUser(iduser);
            return String.format("Utilisateur supprimé !");
        }
        catch (Exception e)
        {
            return String.format(e.getMessage());
        }
    }


}
