public class Point {
    private double x;
    private double y;

    public void setX(double x) {
  this.x = x;
    }
    public void setY(double y) {
  this.y = y;
    }

    Point() {
      x = 0.0;
      y = 0.0;
    }

    Point(double x, double y) {
      this.x = x;
      this.y = y;
    }

  public String toString()
  {String s="("+x+";"+y+")";
  return s;}

  // перегрузку equals определять не сразу
  /*public boolean equals(Object o)
  {// если тип совместим с Point
  if (o instanceof Point)
   {Point p=(Point)o;
   return p.x==x&&p.y==y;
   }
  // если тип не совместим с Point
   return false;
  }*/
  }


  public class A {
  public static void main (String[] args) {
  Point p=new Point(), p1=new Point(2,3);

  //System.out.println("p="+p.toString());
  //System.out.println("p1="+p1.toString());
  //Class c1=p.getClass();
  //System.out.println("c1="+c1+"\n"+c1.getName());// c1=class Point     Point
  Point p2=new Point(2,3);
  //без перегрузки equals
  if(p.equals(p1)) System.out.println("да"); else System.out.println("нет");//нет
  //if(p1.equals(p2)) System.out.println("да"); else System.out.println("нет");//нет
  Point p3=p2;
  if(p3.equals(p2)) System.out.println("да"); else System.out.println("нет");//да
  /*
  //после перегрузки equals
  if(p1.equals(p2)) System.out.println("да"); else System.out.println("нет");//нет
  Point3 pp1=new Point3();
  System.out.println("pp1="+pp1);
  */
  }

  }
}



