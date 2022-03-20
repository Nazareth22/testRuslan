<?php


class Output
{
    public function __construct(private Connection $connection)
    {
    }

    public function select()
    {

        $output = $this->connection->getData();

        if ($output) {
            $rowsCount = $output->rowCount(); // количество полученных строк
            echo "<p>Получено объектов: $rowsCount</p>";
            echo "<table><tr><th>first_name</th><th>last_name</th><th>middle_name</th><th>age</th></tr>";
        }
        foreach($output as $row){
            echo "<tr>";
            echo "<td>" . $row["first_name"]. "</td>";
            echo "<td>" . $row["last_name"]. "</td>";
            echo "<td>" . $row["middle_name"]. "</td>";
            if ($row["age"] > 60) {
                echo "<td class='red'>".$row["age"]."</td>";
            } else {
                echo "<td>".$row["age"]."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
