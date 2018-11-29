/* HelloWorld.java
 */

public class HelloWorld
{
	public static void main(String[] args) {
		System.out.println("Hello World!");
	}

	public void test(){
	    StringBuilder query = new StringBuilder();
        query.append( "select * from user u where u.name in (" + namesString + ")" );
        try {
        	Connection connection = getConnection();
            Statement statement = connection.createStatement();
            resultSet = statement.executeQuery(query.toString());
        }

	}
}

