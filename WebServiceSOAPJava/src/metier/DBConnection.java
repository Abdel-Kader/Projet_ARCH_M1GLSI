package metier;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLDataException;


public class DBConnection
{
    //URL de connexion
    private String url = "jdbc:mysql://localhost:3306/news_db?useUnicode=true&useJDBCCompliantTimezoneShift=true&useLegacyDatetimeCode=false&serverTimezone=UTC";
    //Nom du user
    private String user = "newsuser";
    //Mot de passe de l'utilisateur
    private String passwd = "newsuser";
    //Objet Connection
    private static Connection connect;

    private DBConnection()
    {
        try
        {
            //Class.forName("com.mysql.cj.jdbc.Driver");
            connect = DriverManager.getConnection(url, user, passwd);
        }
        catch (Exception e)
        {
            e.printStackTrace();
        }
    }

    public static Connection getInstance()
    {
        if(connect == null)
        {
            new DBConnection();
            System.out.println("Nouvelle connexion créée...");
        }

        return connect;
    }
}
